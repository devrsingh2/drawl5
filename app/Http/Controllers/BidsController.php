<?php

namespace App\Http\Controllers;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Bid;
use App\BidAdditional;
use App\Helpers\GeneralHelper;
use App\Payment;
use App\Product;
use App\Purchase;
use App\Requirement;
use App\Setting;
use Illuminate\Http\Request;
use App\UserCategory;
use App\Notification;
use Illuminate\Support\Facades\Mail;

class BidsController extends Controller
{
    //

    public function placeBid($requirement_id)
    {
        $lowest_amt_bids = Bid::with('User')
            ->where('requirement_id',$requirement_id)
            ->orderBy('amount')->get()->take(5)
            ->where('user_id','<>', auth()->user()->id);
        $data['title'] = "Your requirement is bidded by vendor ".auth()->user()->name;
        return view('tenant.vendors.requirement.place-bid',compact('lowest_amt_bids'));
    }

    public function submitBid(Request $request)
    {
        $token_amt = Setting::find(7)->value;
        $validator = $this->validate(
            $request,
            [
                'amount' => 'required|numeric|min:"'.$token_amt.'"',
                'description' => 'required',
                /*'attachment' =>'required|max:2048'*/
            ],
            [
                'amount.required' => "Please enter amount.",
                'description.required' => "Please enter description.",
            ]
        );

        $bid = new Bid();
        $bid->user_id = auth()->user()->id;
        $bid->requirement_id = $request->requirement_id;
        $bid->description = $request->description;
        $bid->amount = $request->amount;
        $bid->status = 'pending';
        $bid->save();

        $img_dest = public_path('img/vendorbid');
        if ($file = $request->file('attachment')) {
            $name = $file->getClientOriginalName();
            $file->move($img_dest, $name);
            /*Insert your data*/
            $bidImg = new BidAdditional();
            $bidImg->bid_id = $bid->id;
            $bidImg->attachment = $name;
            $bidImg->save();
            /*Insert your data*/
        }

        $this->bidNotificationToCustomer($bid->id);
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Your bid has been placed successfully.');

        return redirect(route('vendor.active-bid-requirement'));
    }

    public function listBids($requirement_id)
    {

        $bids = Bid::with('User')
            ->where('requirement_id', $requirement_id)
            ->where('user_id','<>', auth()->user()->id)
            ->orderBy('amount')
            ->paginate(5);
        return view('tenant.customers.bids.list-bids', compact('bids'));
    }

    public function bidNotificationToCustomer($bid_id)
    {
        $userBid = Bid::find($bid_id);
        $notification = new Notification();
        $notification->subject = 'Bid Placed';

        $tenant = GeneralHelper::getCurrentTenant();

        if ($tenant === env('CLIENT1')) {
            $notification->message = "A new bid is placed to your requirement ".$userBid->product->name." by user ".auth()->user()->name;
            $notification->category_id = $userBid->product->category_id;
            $notification->from_user_id = auth()->user()->id;
            $notification->to_user_id = $userBid->product->user_id;
            $notification->requirement_id = $userBid->product->id;
        }
        else {
            $notification->message = "A new bid is placed to your requirement ".$userBid->requirement->title." by user ".auth()->user()->name;
            $notification->category_id = $userBid->requirement->category_id;
            $notification->from_user_id = auth()->user()->id;
            $notification->to_user_id = $userBid->requirement->user_id;
            $notification->requirement_id = $userBid->requirement->id;
        }

        $notification->status = 'unread';
        $notification->type = 'bid_placed';
        $notification->save();

        $arr_data = [];
        if ($tenant === env('CLIENT1')) {
            $email = \App\Setting::find(3)->value;
            $arr_data['req_title'] = $userBid->product->name;
            $arr_data['vendor'] = auth()->user()->name;
        }
        else {
            $email = $userBid->requirement->user->email;
            $arr_data = [];
            $arr_data['req_title'] = $userBid->requirement->title;
            $arr_data['vendor'] = auth()->user()->name;
        }
        Mail::send('emails.bid_placed_by_vendor', $arr_data, function($message) use ($email)
        {
            $message->to($email)
                ->subject('Bid Placed');
        });
    }

    public function acceptBid($req_id, $bidid)
    {
        $bid = Bid::find($bidid);
        if(!isset($bid)) {
            request()->session()->flash('alert-class', 'alert-danger');
            request()->session()->flash('message', "Selected bid not found.");
            return redirect(route('customer.list-bids', $req_id));
        }
        $requirement = Requirement::find($req_id);
        $remaining_amt = $bid->amount - $requirement->paid_amount;
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
            'order' => uniqid(),
            'user' => 'Cust1',
            'mobile_number' => auth()->user()->phone,
            'email' => auth()->user()->email,
            'amount' => $remaining_amt,
            'callback_url' => route('customer.bid-payment-callback', [$req_id, $bidid])
        ]);
        return $payment->receive();

    }

    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback($req_id, $bidid)
    {
        $transaction = PaytmWallet::with('receive');

        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm

        if($transaction->isSuccessful()) {
            $bid = Bid::find($bidid);
            if(!isset($bid)) {
                request()->session()->flash('alert-class', 'alert-danger');
                request()->session()->flash('message', "Selected bid not found.");
                return redirect(route('customer.list-bids', $req_id));
            }
            $bid->status = 'accepted';
            $bid->save();
            $requirement = Requirement::find($req_id);
//            if (isset($bid)) {
            $requirement->cost = $bid->amount;
//                $requirement->paid_amount = $bid->amount;
            $requirement->status = 'inprogress';
            $requirement->save();
            $toEmail = $bid->User->email;
            $arr_data = [];
            $arr_data['USERNAME'] = $bid->User->name;
            $arr_data['REQUIREMENT_NAME'] = $requirement->title;
            $arr_data['REQUIREMENT_URL'] = route('vendor.inprogress-requirement');
            Mail::send('emails.bid-accepted', $arr_data, function($message) use ($toEmail)
            {
                $message->to($toEmail)
                    ->subject('Bid Accepted');
            });
//            }
            //reject all bids except above 1
            $bids = Bid::where('requirement_id', $req_id)
                ->where('status', '<>', 'accepted');
            $bids->update(
                [
                    'status' => 'cancel'
                ]
            );
            $rejected_bids = $bids->get();
            if (count($rejected_bids) > 0) {
                $emails = [];
                foreach ($rejected_bids as $key => $item) {
                    $emails[$key] = $item->User->email;
                }
                $arr_data = [];
                $arr_data['REQUIREMENT_NAME'] = $requirement->title;
                Mail::send('emails.bid-rejected', $arr_data, function($message) use ($emails)
                {
                    $message->to($emails)
                        ->subject('Bid Cancelled');
                });
            }
            //insert into payment table
            $payment = new Payment();
            $payment->user_id = auth()->user()->id;
            $payment->bid_id = $bidid;
            $payment->amount = $bid->amount - $requirement->paid_amount;
            $payment->transaction_id = $transaction->getTransactionId();
            $payment->method = 'cash';
            $payment->status = 1;
            $payment->save();

            //insert in to purchase
            $purchase = new Purchase();
            $purchase->user_id = auth()->user()->id;
            $purchase->requirement_id = $req_id;
            $purchase->product_id = isset($requirement->product_id) ? $requirement->product_id : null;
            $purchase->status = 1;
            $purchase->save();

            request()->session()->flash('alert-class', 'alert-success');
            request()->session()->flash('message', 'You have accepted successfully.');
            return redirect(route('inprogress-requirement'));
        }
        else if($transaction->isFailed()) {
            //Transaction Failed
            request()->session()->flash('alert-class', 'alert-danger');
            request()->session()->flash('message', 'Payment failed, please try again.');
            return redirect(route('customer.list-bids', $req_id));
        }
        /*else if($transaction->isOpen()) {
            //Transaction Open/Processing
        }*/
        /*
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id
        $transaction->getTransactionId(); // Get transaction id
        */


    }

    public function rejectBid($req_id, $bidid)
    {

        $bid = Bid::find($bidid);
        if(!isset($bid)) {
            request()->session()->flash('alert-class', 'alert-danger');
            request()->session()->flash('message', "Selected bid not found.");
            return redirect(route('customer.list-bids', $req_id));
        }
        $bid->status = 'cancel';
        $bid->save();

        $toEmail = $bid->User->email;
        $requirement = Requirement::find($bid->requirement_id);
        $arr_data = [];
        $arr_data['REQUIREMENT_NAME'] = $requirement->title;
        Mail::send('emails.bid-rejected', $arr_data, function($message) use ($toEmail)
        {
            $message->to($toEmail)
                ->subject('Bid Cancelled');
        });

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'You have rejected successfully.');
        return redirect(route('customer.list-bids', $req_id));
    }


    public function customerPlaceBid($product_id)
    {
        $product = Product::find($product_id);
        if(!isset($product)) {
            request()->session()->flash('alert-class', 'alert-danger');
            request()->session()->flash('message', "Selected product not found.");
            return redirect(route('home'));
        }
        return view('tenant.customers.bids.place-bid', compact('product_id'));
    }

    public function submitCustomerBid(Request $request)
    {
        $product = Product::find($request->product_id);
        $validator = $this->validate(
            $request,
            [
                'amount' => 'required|numeric|between:"'.$product->min_price.'","'.$product->max_price.'"',
                'description' => 'required',
                /*'attachment' =>'required|max:2048'*/
            ],
            [
                'amount.required' => "Please enter amount.",
                'description.required' => "Please enter description.",
            ]
        );

        $bid = new Bid();
        $bid->user_id = auth()->user()->id;
        $bid->product_id = $request->product_id;
        $bid->description = $request->description;
        $bid->amount = $request->amount;
        $bid->status = 'pending';
        $bid->save();

        $img_dest = public_path('img/vendorbid');
        if ($file = $request->file('attachment')) {
            $name = $file->getClientOriginalName();
            $file->move($img_dest, $name);
            /*Insert your data*/
            $bidImg = new BidAdditional();
            $bidImg->bid_id = $bid->id;
            $bidImg->attachment = $name;
            $bidImg->save();
            /*Insert your data*/
        }

        $this->bidNotificationToCustomer($bid->id);
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Your bid has been placed successfully.');

        return redirect(route('customer.dashboard'));
    }

}

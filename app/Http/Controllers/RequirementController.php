<?php

namespace App\Http\Controllers;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Helpers\GeneralHelper;
use App\Payment;
use App\Product;
use App\Purchase;
use App\Requirement;
use App\RequirementAdditional;
use App\Setting;
use App\User;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Category;

class RequirementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function openRequirements()
    {
        $items = Requirement::where('user_id', auth()->user()->id)
            ->where(function ($q) {
                $q->orWhere('status', 'pending')
                    ->orWhere('status', 'active');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('tenant.customers.requirements.open-requirement', compact('items'));
    }

    public function inProgressRequirements()
    {

        $items = Requirement::where('user_id', auth()->user()->id)
            ->where('status', 'inprogress')
            ->paginate(10);
        return view('tenant.customers.requirements.inprogress-requirement', compact('items'));
    }

    public function completedRequirements()
    {
        $items = Requirement::where('user_id', auth()->user()->id)
            ->where('status', 'completed')
            ->paginate(10);
        return view('tenant.customers.requirements.completed-requirement', compact('items'));
    }

    public function requirementDetail($id)
    {
        $requirement = Requirement::find($id);
        return view('tenant.customers.requirements.requirement-detail', compact('requirement'));
    }

    public function getProductInfo(Request $request)
    {
        $response = [
            'status' => true,
            'error_code' => 0,
            'message' => '',
            'error' => [],
            'results' => []
        ];
        $product = Product::find($request->product_id)
            ->toArray();
        $response['status'] = false;
        $response['error_code'] = 1;
        $response['results'] = $product;
        return response()->json($response);
    }

    public function placeRequirement($id = null)
    {
        $product = new Collection();
        $categories = Category::all();
        if (isset($id)) {
            $product = Product::find($id);
            if (!isset($product)) {
                request()->session()->flash('alert-class', 'alert-danger');
                request()->session()->flash('message', 'Requested product not found.');
                return back();
            }
        }

        return view('tenant.customers.requirements.place-requirement', compact(['product','categories']));
    }

    public function placeRequirementUsingCategory($id = null)
    {
        $product = new Collection();
        if (isset($id)) {
            $categories = Category::where(['id'=>$id,'status'=>'1'])->get();
            if (!isset($categories)) {
                request()->session()->flash('alert-class', 'alert-danger');
                request()->session()->flash('message', 'Requested category not found.');
                return back();
            }
        }
        return view('tenant.customers.requirements.place-requirement', compact(['categories','product']));
    }

    public function postRequirement(Request $request)
    {

        $rules = [];
        $messages = [];
//        $rules['product_id'] = 'required';
        $rules['title'] = 'required';
        $rules['description'] = 'required';
        if ($request->product_id == null) {
            $rules['category'] = 'required';
            $messages['category.required'] = 'Please select category.';
        }
        $rules['quantity'] = 'required';
//        $rules['attachment'] = 'required';
        $validator = $this->validate(
            $request,
            $rules,
            $messages
        );

        if ($request->product_id !== null) {
            $product = Product::find($request->product_id);
            $category_id = $product->category_id;
        }
        else {
            $category_id = $request->category;
        }
        $request->merge(['category_id' => $category_id]);
        if(!isset($category_id)) {
            request()->session()->flash('alert-class', 'alert-danger');
            request()->session()->flash('message', "Something went wrong, please try again.");
            return back();
        }
        $token_amt = Setting::find(7)->value; //in percent

        if($token_amt <= 0) {
            request()->session()->flash('alert-class', 'alert-danger');
            request()->session()->flash('message', "Something went wrong, please try again.");
            return back();
        }

        $temp_json_file = public_path('temp-json/'.auth()->user()->id.'.json');
        if (File::isFile($temp_json_file)) {
            unlink($temp_json_file);
        }
        if ($file = $request->file('attachment')) {
            $img_dest = public_path('img/requirements');
            $name = $file->getClientOriginalName();
            $file->move($img_dest, $name);
            $file_name = $name;
//            $request->request->add(['file_name', $file_name]);
            $request->merge(['file_name' => $file_name]);
        }
        $request_data = json_encode($request->all(), JSON_UNESCAPED_UNICODE);

        if (!File::isFile($temp_json_file)) {
            File::put($temp_json_file, $request_data);
        }

        $payment = PaytmWallet::with('receive');
        $payment->prepare([
            'order' => uniqid(),
            'user' => 'Cust1',
            'mobile_number' => auth()->user()->phone,
            'email' => auth()->user()->email,
            'amount' => $token_amt,
            'callback_url' => route('post-requirement-payment-callback', [auth()->user()->id])
        ]);
        return $payment->receive();
    }

    public function submitRequirementPaymentCallback(Request $request)
    {
        $transaction = PaytmWallet::with('receive');

        $response = $transaction->response();
        $temp_json_file = public_path('temp-json/'.auth()->user()->id.'.json');
        $strJson = file_get_contents($temp_json_file);
        $jsonData = (object) json_decode($strJson, true); // decode the JSON into an associative array
        if($transaction->isSuccessful()) {
            $token_amt = Setting::find(7)->value;
            $requirement = new Requirement();
            $requirement->user_id = Auth::user()->id;
            $requirement->category_id = $jsonData->category_id;
            $requirement->title = $jsonData->title;
            $requirement->description = $jsonData->description;
            $requirement->quantity = $jsonData->quantity;
            $requirement->paid_amount = $token_amt;
            $requirement->product_id = isset($jsonData->product_id) ? $jsonData->product_id : null;
            $requirement->active = true;
            $requirement->save();
            $requirement_id = $requirement->id;
            $images = array();
            if (isset($jsonData->file_name)) {
                $requirementImg = new RequirementAdditional();
                $requirementImg->requirement_id = $requirement->id;
                $requirementImg->attachment = $jsonData->file_name;
                $requirementImg->status = 1;
                $requirementImg->save();
            }
            if ($requirement->id != '') {
                if (\App\Setting::find(6)->value === 'auto') {
                    $this->requirementNotificationToVendor($requirement_id);
                }
                if (File::isFile($temp_json_file)) {
                    unlink($temp_json_file);
                }

                //insert into payment table
                $payment = new Payment();
                $payment->user_id = auth()->user()->id;
                $payment->requirement_id = $requirement_id;
                $payment->amount = $token_amt;
                $payment->transaction_id = $transaction->getTransactionId();
                $payment->method = 'cash';
                $payment->status = 1;
                $payment->save();

                request()->session()->flash('alert-class', 'alert-success');
                request()->session()->flash('message', 'Requirement has been posted successfully.');
                return redirect(route('open-requirement'));
            }
            else {
                request()->session()->flash('alert-class', 'alert-danger');
                request()->session()->flash('message', 'Something went wrong please try again.');
                return back();
            }
        }
        else if($transaction->isFailed()) {
            //Transaction Failed
            request()->session()->flash('alert-class', 'alert-danger');
            request()->session()->flash('message', 'Payment failed, please try again.');
        }
    }

    public function getRequirement()
    {
        $requirements = Requirement::where('user_id', Auth::user()->id)->get();
        return json_encode(array("success"=>true,"error_code"=>0,"status"=>false, "data"=>$requirements->toArray()));
    }

    public function getProfile()
    {
        $users = User::where('id', Auth::user()->id)->get();
        return json_encode(array("success"=>true,"error_code"=>0,"status"=>false, "data"=>$users->toArray()));
    }

    public function requirementNotificationToVendor($id)
    {
        $requirement = Requirement::findOrFail($id);
        $vendors = User::where('account_status', '1')
            ->where('email_verified', 1)
            ->where('role', 3)
            ->FilterCategory($requirement->category_id)
            ->paginate(10);

        if (isset($vendors) && count($vendors) > 0) {
            foreach ($vendors as $key => $item) {
                $notification = new Notification();
                $notification->subject = 'Posted Requirement Notification';
//                    $notification->message = "A new requirement has been posted under your service, please place bid accordingly. ". $place_bid;
                $notification->message = "A new requirement ".$requirement->title."has been posted under your service, please place bid accordingly.";
                $notification->category_id = $requirement->category_id;
                $notification->from_user_id = $requirement->user_id;
                $notification->to_user_id = $item->id;
                $notification->requirement_id = $requirement->id;
                $notification->status = 'unread';
                $notification->save();
            }
            $emails = $vendors->pluck('email')->toArray();
            $arr_data = [];
            $arr_data['BID_URL'] = route('vendor.place-bid', $id);
            Mail::send('emails.posted-requirement', $arr_data, function($message) use ($emails)
            {
                $message->to($emails)
                    ->subject('Posted Requirement Notification');
            });
        }
    }

    public function customerPurchase()
    {
        $items = Purchase::where('user_id', auth()->user()->id)
            ->where('status', 1)
            ->paginate(10);
        return view('tenant.customers.requirements.purchase', compact('items'));
    }

    public function customerPaymentHistory()
    {
        $items = Payment::where('user_id', auth()->user()->id)
            ->where('status', 1)
            ->paginate(10);
//        dd($items);
        return view('tenant.customers.payments.history', compact('items'));
    }


}

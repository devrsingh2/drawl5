<?php

namespace App\Http\Controllers\Admin;

use App\Notification;
use App\Requirement;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class RequirementsController extends Controller
{
    //
    public function index()
    {
        $items = Requirement::all();
        return view('tenant.admin.requirements.index', compact('items'));
    }

    public function listWholeSalers($id)
    {
        $requirement = Requirement::findOrFail($id);
        $wholesalers = new Collection();
        if (isset($requirement)) {
            $wholesalers = User::where('account_status', '1')
                ->where('email_verified', 1)
                ->where('role', 3)
                ->FilterCategory($requirement->category_id)
                ->paginate(10);
        }
        return view('tenant.admin.requirements.list-wholesalers', compact('wholesalers', 'id'));
    }

    public function sendNotification(Request $request, $id)
    {
        $requirement = Requirement::findOrFail($id);
        if(!isset($requirement)) {
            request()->session()->flash('alert-class', 'alert-warning');
            request()->session()->flash('message', "Selected requirement not found.");
            return back();
        }
        if (isset($request->ids) && count($request->ids) > 0) {
            $items = User::whereIn('id', $request->ids)->get();
            if (count($items) > 0) {
                $place_bid = "<a class='btn btn-sm btn-primary' href='".route('vendor.place-bid', $id)."' title='Place Bid'>Place Your Bid</a>";
                foreach ($items as $key => $item) {
                    $notification = new Notification();
                    $notification->subject = 'Posted Requirement Notification';
//                    $notification->message = "A new requirement has been posted under your service, please place bid accordingly. ". $place_bid;
                    $notification->message = "A new requirement has been posted under your service, please place bid accordingly.";
                    $notification->category_id = $requirement->category_id;
                    $notification->from_user_id = $requirement->user_id;
                    $notification->to_user_id = $item->id;
                    $notification->requirement_id = $requirement->id;
                    $notification->status = 'unread';
                    $notification->save();
                }
                $emails = $items->pluck('email')->toArray();
                $arr_data = [];
                $arr_data['BID_URL'] = route('vendor.place-bid', $id);
                Mail::send('emails.posted-requirement', $arr_data, function($message) use ($emails)
                {
                    $message->to($emails)
                        ->subject('Posted Requirement Notification');
                });
            }
            request()->session()->flash('alert-class', 'alert-success');
            request()->session()->flash('message', 'Notification sent successfully.');
        }else{
            request()->session()->flash('alert-class', 'alert-warning');
            request()->session()->flash('message', 'Something went wrong, please try again.');
        }
        return back();
    }

}

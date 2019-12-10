<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function vendorNotification()
    {
        $user_id = auth()->user()->id;
        $items = Notification::where(function ($q) use($user_id) {
            $q->orWhere('to_user_id', $user_id);
        })
            ->orderBy('id', 'desc')
            ->get();
        $req_arr = Bid::where('user_id', $user_id)->pluck('requirement_id')->toArray();

        /*orWhere('from_user_id', $user_id)*/
        return view('tenant.vendors.requirement.requirement-notification',compact(['items','req_arr']));
    }

    public function userNotification()
    {

        $items = Notification::where(['to_user_id' => auth()->user()->id, 'status' => 'unread'])
            ->orderBy('id', 'desc')
            ->get()
            ->toArray();
            return $items;


    }
    public function getVendorNotificationFromCustomer()
    {
        $req_arr = Bid::where('user_id', auth()->user()->id)->pluck('requirement_id')->toArray();
        $items = Notification::where(['to_user_id' => auth()->user()->id, 'status' => 'unread'])
            ->whereNotIn('requirement_id',$req_arr)
            ->orderBy('id', 'desc')
            ->get()
            ->toArray();
        return $items;
    }

    public function changeNotificationStatus()
    {
        $noti = Notification::where('id', request()->id)->first();
        $noti->status = 'read';
        $noti->save();
    }
}

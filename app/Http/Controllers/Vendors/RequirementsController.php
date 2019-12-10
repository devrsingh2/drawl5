<?php

namespace App\Http\Controllers\Vendors;

use App\Helpers\VendorHelper;
use App\Mail\RequirementCompleted;
use App\Notification;
use App\Requirement;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class RequirementsController extends Controller
{

    public function activeBidRequirements()
    {
        $category_ids = VendorHelper::getVendorCategories();
        $requirements = Requirement::whereIn('category_id', $category_ids)
            ->where(function ($q) {
                $q->orWhere('status', 'pending')
                    ->orWhere('status', 'active');
            })
            ->FilterBid(auth()->user()->id)
            ->paginate(10);
        return view('vendors.requirement.active-bids-requirement', compact('requirements'));
    }

    public function inprogressRequirements()
    {
        $category_ids = VendorHelper::getVendorCategories();
        $items = Requirement::whereIn('category_id', $category_ids)
            ->where('status', 'inprogress')
            ->FilterBid(auth()->user()->id)
            ->paginate(10);

        return view('vendors.requirement.inprogress-requirements', compact('items'));
    }

    public function completeRequirements($id)
    {
        $requirement = Requirement::find($id);
        if(!isset($requirement)) {
            request()->session()->flash('alert-class', 'alert-danger');
            request()->session()->flash('message', "Selected requirement not available.");
            return back();
        }
        $requirement->status = 'completed';
        $requirement->save();
        $requirement->url = route('completed-requirement');
        $toEmail = $requirement->user->email;
        Mail::to($toEmail)->send(new RequirementCompleted($requirement));
//        Mail::to('rsingh2@katalysttech.com')->send(new RequirementCompleted($requirement));
        //admin email
        $arr_req = [];
        $arr_req['title'] = $requirement->title;
        $arr_req['req_url'] = route('requirements.list');
        $email = Setting::find(3)->value;
        Mail::send('emails.requirement-completed-admin', $arr_req,  function ($msg) use($email) {
            $msg->to('rsingh2@katalysttech.com')
                ->subject('Requirement Completed');
        });
        //Send notification to user
        $notification = new Notification;
        $notification->subject = 'Requirement Completed';
        $notification->message = "Your requirement named ".$requirement->title.", has been completed.";
        $notification->category_id = $requirement->category_id;
        $notification->from_user_id = $requirement->user_id;
        $notification->to_user_id = $requirement->user->id;
        $notification->requirement_id = $requirement->id;
        $notification->status = 'unread';
        $notification->save();

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Requirement completed successfully.');
        return redirect(route('vendor.completed-requirement'));
    }

    public function completedRequirements()
    {
        $category_ids = VendorHelper::getVendorCategories();
        $items = Requirement::whereIn('category_id', $category_ids)
            ->where('status', 'completed')
            ->FilterBid(auth()->user()->id)
            ->paginate(10);
        return view('vendors.requirement.completed-requirements', compact('items'));
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\NewsletterSubscription;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use App\Newsletter;
use App\NewsletterCustomerMapping;

class NewsletterController extends Controller
{
    public function getNewsletterList()
    {
        $newsletters = Newsletter::all();
        return view('tenant.admin.newsletter.list-newsletter', compact('newsletters'));
    }
    public function create()
    {
        return view('tenant.admin.newsletter.create-newsletter');
    }
    public function storeNewsletter(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'title' => 'required',
                'description' => 'required',
                'dcontent' => 'required'
            ],
            [
                'dcontent.required' => 'Content field is required'
            ]
        );

        Newsletter::create(['title' => request()->title, 'description' => request()->description, 'content' => request()->dcontent,'created_by' => auth()->user()->id]);
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Newsletter added successfully.');
        return redirect(route('newsletter.list'));
    }
    public function edit($id)
    {
        $newsletter =  Newsletter::find($id);
        return view('admin.newsletter.edit-newsletter', compact('newsletter'));
    }
    public function updateNewsletter(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'title' => 'required',
                'description' => 'required',
                'dcontent' => 'required'
            ],
            [
                'dcontent.required' => 'Content field is required'
            ]
        );
       
        $newsletter = Newsletter::find($request->edit_id);
        $newsletter->title =  $request->title;
        $newsletter->description =  $request->description;
        $newsletter->content =  $request->dcontent;
        $newsletter->save();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Newsletter updated successfully.');
        return redirect(route('newsletter.list'));
    }
    public function deleteNewsletter($id)
    {
        $newsletter = Newsletter::find($id);
        $newsletter->delete();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Newsletter deleted successfully.');
        return redirect(route('newsletter.list'));

    }
    public function selectNewsletterUser($id){
        $newsletter = Newsletter::find($id);
        $subscribers = NewsletterSubscription::all();
        $subs = [];
        foreach ($subscribers as $subscriber){
            $subs_arr = array_push($subs, $subscriber->email);
        }
        if(isset($subs)&&count($subs)>0){
            $users = implode(',' ,$subs);
        }else{
            $users = "";
        }
        return view('tenant.admin.newsletter.send-newsletter',compact(['users','newsletter']));
    }
    public function sendNewsletterUser(){

        $validator = $this->validate(
            request(),
            [
                'subscriber' => 'required'
            ]
        );
        $subs = explode(",", request()->subscriber);
        $newsletter_desc = Newsletter::find(request()->newsletter_id);
        foreach($subs as $sub){
         $user = User::where('email',$sub)->first();
         $user_id = isset($user->id)?$user->id:"";
         NewsletterCustomerMapping::create(['newsletter_id'=>request()->newsletter_id,'email'=>$sub,'user_id'=>$user_id]);
         $email = $sub;
            $arr_data['subject'] = $newsletter_desc->title;
            $arr_data['description'] = $newsletter_desc->description;
            $arr_data['content'] = $newsletter_desc->content;
            Mail::send('emails.newsletter', $arr_data, function($message) use($email,$newsletter_desc){
             $message->to($email)
                 ->subject($newsletter_desc->title);
         });
        }
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Newsletter submitted successfully.');
        return redirect(route('newsletter.list'));
    }

}

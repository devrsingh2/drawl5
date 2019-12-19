<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{

    public function contactUs(Request $request)
    {
        $validator = $this->validate(
            request(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required'
            ]
        );
        /*if (isset($validator) && count($validator) === 0) {

            request()->session()->flash('alert-class', 'alert-danger');
            request()->session()->flash('message', 'Something went wrong, please try again.');
            return back();
        }*/

        $email = \App\Setting::find(3)->value;
        $contact = (object) array(
            'name' => $request->name,
            'message' => $request->message,
            'contact_date' => date('d-m-Y'),
        );
        Mail::to($email)->send(new ContactUs($contact));
        /*$mail = Mail::raw($request->message, function($message) use($email)
        {
            $message->to($email)
                ->from(request()->email)
                ->subject(request()->subject);
        });*/
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Message sent successfully.');
        return redirect()->back();
    }

}

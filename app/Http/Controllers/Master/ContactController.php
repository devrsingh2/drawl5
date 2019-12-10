<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class ContactController extends Controller
{
    //
    public function contactAdmin()
    {
        try {
            $validator = request()->validate(
                [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255',
                    'subject' => 'required|string|max:255',
                    'message' => 'required'
                ]
            );
        } catch (\Illuminate\Validation\ValidationException $e ) {
            $validator = $e->errors();
            return redirect(url('/').'/#contact')->withErrors($validator);
        }
        $email = 'rsingh2@katalysttech.com';
        $contact = (object) array(
            'name' => request()->name,
            'message' => request()->message,
            'contact_date' => date('d-m-Y'),
        );
        Mail::to($email)->send(new ContactUs($contact));
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Message sent successfully.');
        return redirect()->back();

    }

}

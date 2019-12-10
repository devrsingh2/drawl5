<?php

namespace App\Http\Controllers\Master;

use App\Mail\SubscribeUs;
use App\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function subscribeEmail()
    {
        try {
            $validator = request()->validate(
                [
                    'subscribe_email' => ['required', function ($attribute, $value, $fail) {
                        $newsletter_subscription = NewsletterSubscription::where('email', request()->subscribe_email)
                            ->first();
                        if (isset($newsletter_subscription)) {
                            return $fail(__('You have already subscribed us.'));
                        }
                    }],
                    ['string|email']
                ],
                [
                    'subscribe_email.required' => 'Please enter your email address',
                    'subscribe_email.string' => 'Please enter a valid email address',
                    'subscribe_email.email' => 'Please enter a valid email address',
                ]
            );
        } catch (\Illuminate\Validation\ValidationException $e ) {
            $validator = $e->errors();
            return redirect(url('/').'/#newsletter')->withErrors($validator);
        }
        $newsletter_subscription = new NewsletterSubscription;
        $newsletter_subscription->email = request()->subscribe_email;
        $newsletter_subscription->save();
        $email = request()->subscribe_email;
        $subscribe = (object) array(
            'email' => request()->subscribe_email
        );
        Mail::to($email)->send(new SubscribeUs($subscribe));
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Thank you for subscribing Us.');
        return redirect()->back();

    }

}

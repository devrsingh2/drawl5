<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function requestDomain()
    {
        return view('master.domain-request.create');
    }

    public function submitRequestedDomain(Request $request)
    {
        dd("Working...");
        $validator = $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => "Please enter your registerd email address.",
                'email.email' => "Please enter a valid email address.",
                'password.required' => "Please enter your registerd password."
            ]
        );
        $request->session()->flash('alert-class', 'alert-success');
        $request->session()->flash('message', 'Your registered successfully.');
        return redirect()->back();
    }
}
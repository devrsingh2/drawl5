<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\GeneralHelper;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use \Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm() {
        return view('tenant.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'terms' =>'required',
                'phone' =>'required'
            ],
            [
                'terms.required' => 'Please check terms and privacy'
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function postRegister(Request $request)
    {
        if($request->terms){
            $request->merge(['terms' => 'on']);
        }else{
            $request->merge(['terms' => '']);
        }
        $this->validator($request->all())->validate();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->email_verified = false;
        $user->account_status = '0';
        $user->activation_code = GeneralHelper::generateReferenceNumber();
        $user->password = Hash::make($request->password);
        $user->role = isset($request->role) ? $request->role : '2';
        $user->save();
        $user->activation_link = route('verify-user-email', $user->activation_code);
        Mail::to($user->email)->send(new WelcomeMail($user));

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Your registration done successfully, We sent activation code. Please check your mail');

        return redirect('/login')->with('status', 'We sent you an activation code. Check your email.');
        //return view('auth.login')->with('status', 'We sent you an activation code. Check your email.');
    }

    protected  function verifyUserEmail($activation_code)
    {
        $user_activation = User::where('activation_code', $activation_code)->first();
        if($user_activation){
            $user_activation->activation_code = '';
            if ($user_activation->account_status == '0') {
                $user_activation->account_status = '1';
            }
            $user_activation->email_verified = 1;
            $user_activation->save();
            request()->session()->flash('alert-class', 'alert-success');
            request()->session()->flash('message', "Congratulations! your email has been updated successfully. Please login to continue");
            return redirect("login");
        }

    }

}

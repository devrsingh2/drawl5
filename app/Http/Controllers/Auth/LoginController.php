<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm() {
        return view('tenant.auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
//            'email' => 'required|email:rfc,dns',
            'email' => 'required|email:rfc',
            'password' => 'required',
        ]);
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password, 'account_status' => '1'])) {
            // Authentication passed...
//            $redirectTo="/home";
            $role = auth()->user()->role;
            switch ($role) {
                case 1:
                    $redirectTo="/admin";
                    break;
                case 2:
                    $redirectTo="/home";
                    break;
                default:
                    $redirectTo="/admin";
                    break;
            }
//            dd($redirectTo);
            request()->session()->flash('alert-class', 'alert-success');
            request()->session()->flash('message', 'Welcome back.');
            return redirect()->intended($redirectTo);
        }else{
            request()->session()->flash('alert-class', 'alert-danger');
            request()->session()->flash('message', 'Something went wrong.');
            return back();
        }
    }

    public function getLogout()
    {
        session()->flash();
        auth()->logout();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'You have logged out successfully.');
        return redirect(route('login'));
    }

}

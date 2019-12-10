<?php

namespace App\Http\Controllers\Master;

use App\AdminUser;
use App\Notifications\TenantCreated;
use App\Tenant;
use App\User;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class MasterController extends Controller
{
    public function index()
    {
        return view('master.home');
    }

    public function dashboard()
    {
        $items = Hostname::all();
        $user = session('userdata');
        return view('master.dashboard', compact('user', 'items'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function domainRegister(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6|confirmed',
                'fqdn' => 'required|unique:system.hostnames'
            ]
        );

//        $request->merge(['fqdn' => $request->fqdn . '.' . config('app.domain')]);
//        $domain = Tenant::create($request->input('fqdn'));
//        $domain = Tenant::registerTenant($request->input('fqdn'));
        $domain = Tenant::registerTenant($request->input('fqdn'), $request->email, $request->password);
        //update website info
        if (isset($domain->website)) {
            $website = Website::where('uuid', $domain->website->uuid)
                ->first();
            if (isset($website)) {
                $website->company_name = $request->name;
//            $website->company_phone = $request->company_phone;
                $website->company_email = $request->email;
//            $website->company_address = $request->company_address;
                $website->save();
            }
        }
        /*$user = $this->domainUserCreate($request->all());
        event(new Registered($user));*/
        event(new Registered($domain->admin));
//        $user->notify(new TenantCreated($request->input('fqdn')));
//        $user->notify(new TenantCreated($domain->hostname));
        $domain->admin->notify(new TenantCreated($domain->hostname));
        request()->session()->flash('alert-class', 'alert-danger');
        request()->session()->flash('message', 'New client created successfully.');
        return redirect(route('admin.home'));
//        return $this->registered($request, $user)
//            ?: redirect('http://' . $request->input('fqdn') . $this->redirectTo);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function domainUserCreate(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
//        $user->phone = $data['phone'];
        $user->email_verified = true;
        $user->account_status = '1';
        $user->role = 1;
        $user->password = Hash::make($data['password']);
        $user->save();
        return $user;
    }

    public function showRegister()
    {
        return view('master.auth.register');
    }

    public function postRegister(Request $request)
    {
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
        $request->session()->flash('message', 'Your have logged out successfully.');
        return redirect()->back();
    }

    public function showLoginForm()
    {
        return view('master.auth.login');
    }

    public function login(Request $request)
    {
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
        $arr = [];
        $arr['email'] = $request->email;
        $user = AdminUser::where('email', $arr['email'])
            ->first();
        if (isset($user) && $user->email === $request->email) {
            if (Hash::check($request->password, $user->password)) {
                //add logic here
                $user_data = (object) [
                    'id' => $user->id,
                    'email' => $user->email,
                    'name' => $user->name,
                    'role' => $user->role,
                    'user_role' => $user->user_role,
                ];
                $request->session()->put('userdata', $user_data);
                $request->session()->flash('alert-class', 'alert-success');
                $request->session()->flash('message', 'Your are logged in successfully.');
                if ($user_data->role === 1) {
                    return redirect()->intended(route('admin.administrator'));
                }
            }
            else {
                $request->session()->flash('alert-class', 'alert-danger');
                $request->session()->flash('message', 'Your email or password is incorrect, please enter correct detail.');
            }
        }
        else {
            $request->session()->flash('alert-class', 'alert-danger');
            $request->session()->flash('message', 'Your email or password is incorrect, please enter correct detail.');
        }
        return redirect()->back();
    }

    public function showForgotPassword()
    {
        return view('master.auth.forgot-password');
    }

    public function submitForgotPassword(Request $request)
    {
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
        $request->session()->flash('message', 'Your have logged out successfully.');
        return redirect()->back();
    }


    /**
     * @return mixed
     */

    public function createDomain()
    {
        $user = session('userdata');
        return view('master.domain.create', compact('user'));
    }

    public function deleteDomain(Request $request, $id)
    {
//        $hostname = Hostname::find($id);
        dd('Continue');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('userdata');
        $request->session()->flash('alert-class', 'alert-success');
        $request->session()->flash('message', 'Your have logged out successfully.');
        return redirect()->back();
    }

}

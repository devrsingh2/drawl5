<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Mail\WelcomeMail;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{
    public function listCustomers()
    {
        $items = User::where('role', '=', 4)
            ->get();
        return view('tenant.admin.customers.list-customers', compact('items'));
    }

    public function createCustomer()
    {
        return view('tenant.admin.customers.create-customer');
    }

    public function storeCustomer(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
                'phone' => 'required'
            ],
            [
                'name.required' => "Please enter name.",
                'email.required' => "Please enter registerd email address.",
                'email.email' => "Please enter a valid email address.",
                'password.required' => "Please enter password."
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->email_verified = false;
        $user->account_status = '0';
        $user->activation_code = GeneralHelper::generateReferenceNumber();
        $user->role = $request->role;
        $user->save();
        $user->activation_link = route('verify-user-email', $user->activation_code);

        Mail::to($user->email)->send(new WelcomeMail($user));

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'User created successfully.');
        return redirect(route('customers.list'));
    }

    public function editCustomer($id)
    {
        $item = User::findOrFail($id);
        return view('tenant.admin.customers.edit-customer', compact('item'));
    }

    public function updateCustomer(Request $request)
    {

        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|email',
//                'password' => 'required',
                'password_confirmation' => 'same:password',
                'phone' => 'required'
            ],
            [
                'name.required' => "Please enter name.",
                'email.required' => "Please enter registerd email address.",
                'email.email' => "Please enter a valid email address.",
//                'password.required' => "Please enter password."
            ]
        );
        $user = User::find($request->edit_id);
        $user->name = $request->name;
        $user->email = $request->email;
        if (isset($request->password) && $request->password !='') {
            $user->password = Hash::make($request->password);
        }
        $user->phone = $request->phone;
        $user->account_status = $request->account_status;
        $user->save();

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'User updated successfully.');
        return redirect(route('customers.list'));
    }

    public function deleteCustomer($id)
    {
        $user = User::find($id);
        $user->delete();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'User deleted successfully.');
        return redirect(route('customers.list'));
    }

}

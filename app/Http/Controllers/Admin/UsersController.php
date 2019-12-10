<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function listAdmin()
    {
        $items = User::where(function ($q) {
            $q->where('role', '<>', 3)
                ->where('role', '<>', 4);
        })
            ->get();
        return view('tenant.admin.users.list-admin', compact('items'));
    }

    public function createAdmin()
    {
        $roles = Role::where('status', 1)
            ->where(function ($q) {
                $q->where('id', '<>', 1)
                    ->where('id', '<>', 3)
                    ->where('id', '<>', 4);
            })
            ->get();
        return view('tenant.admin.users.create-admin', compact('roles'));
    }

    public function storeAdmin(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
                'role' => 'required'
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
        return redirect(route('admin.list'));
    }

    public function editAdmin($id)
    {
        $item = User::findOrFail($id);
        $roles = Role::where('status', 1)
            ->where(function ($q) {
                $q->where('id', '<>', 1)
                    ->where('id', '<>', 3)
                    ->where('id', '<>', 4);
            })
            ->get();
        return view('tenant.admin.users.edit-admin', compact('item', 'roles'));
    }

    public function updateAdmin(Request $request)
    {

        $rules = [];
        $rules['name'] = 'required';
        $rules['email'] = 'required|email';
        $rules['password_confirmation'] = 'same:password';
        if(Auth::user()->role != 1){
            $rules['role'] = 'required';
        }
        $validator = $this->validate(
            $request,
            $rules,
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
        $user->phone = $request->phone;
        if (isset($request->password) && $request->password !='') {
            $user->password = Hash::make($request->password);
        }
        dd($request->account_status);
        $user->account_status = $request->account_status;
        $user->save();

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'User updated successfully.');
        return redirect(route('admin.list'));
    }

    public function deleteAdmin($id)
    {
        $user = User::find($id);
        $user->delete();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'User deleted successfully.');
        return redirect(route('admin.list'));
    }

}

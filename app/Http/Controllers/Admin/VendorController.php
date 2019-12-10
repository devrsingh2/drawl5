<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Mail\WelcomeMail;
use App\UserCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listVendors()
    {
        $items = User::where('role', 3)
            ->get();
        return view('tenant.admin.vendor.list', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVendor()
    {
        $categories = Category::all();
        return view('tenant.admin.vendor.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVendor(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
                'phone' => 'required',
                'categories' => 'required'
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

        $categories = $request->categories;
        if (isset($categories) && count($categories) > 0) {
            foreach ($categories as $category) {
                $new_permission = new UserCategory();
                $new_permission->user_id = $user->id;
                $new_permission->category_id = $category;
                $new_permission->save();
            }
        }

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Vendor created successfully.');
        return redirect(route('vendors.list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editVendor($id)
    {
        $vendor = User::find($id);
        $categories = Category::all();
        $user_categories = UserCategory::where('user_id', $vendor->id)
            ->get()->pluck('category_id')->toArray();
        return view('tenant.admin.vendor.edit', compact('vendor', 'categories', 'user_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVendor(Request $request)
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

        $users_all_categories = UserCategory::where('user_id', $user->id)->get();
        if (isset($users_all_categories) && count($users_all_categories) > 0) {
            foreach ($users_all_categories as $del) {
                $del->delete();
            }
        }

        $categories = $request->categories;
        if (isset($categories) && count($categories) > 0) {
            foreach ($categories as $category) {
                $new_permission = new UserCategory();
                $new_permission->user_id = $user->id;
                $new_permission->category_id = $category;
                $new_permission->save();
            }
        }

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Vendor updated successfully.');
        return redirect(route('vendors.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteVendor($id)
    {
        $user = User::find($id);
        $user->delete();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Vendor deleted successfully.');
        return redirect(route('vendors.list'));
    }
}

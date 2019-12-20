<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use App\Requirement;
use App\UserCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('tenant.user.dashboard', compact(['req_count','bid_count']));
    }

    public function profile()
    {
        $user = Auth::user();
        $categories = Category::all();
        $user_categories = UserCategory::where('user_id', $user->id)
            ->get()->pluck('category_id')->toArray();
//        dd($categories);
        return view('tenant.user.profile', compact('user', 'categories', 'user_categories'));
    }

    public function updateProfile(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|email',
                'role' => 'required'
            ],
            [
                'name.required' => "Please enter name.",
                'email.required' => "Please enter registerd email address.",
                'email.email' => "Please enter a valid email address.",

            ]
        );
        $user = User::find($request->edit_id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->role = $request->role;
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
        request()->session()->flash('message', 'Your profile updated successfully.');
        return redirect(route('user.profile'));
    }

    public function getSetting()
    {
        if (request()->method() == 'GET') {
            return view('tenant.user.setting');
        } else {
            $user = User::find(auth()->user()->id);
            $validator = $this->validate(
                request(),
                [
                    'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                        if (!\Hash::check(request()->current_password, $user->password)) {
                            return $fail(__('The current password is incorrect.'));
                        }
                    }],
                    'new_password' => 'required|min:6',
                    'password_confirmation' => 'same:new_password'
                ]
            );
            $user->password=Hash::make(request()->password_confirmation);
            $user->save();
            request()->session()->flash('alert-class', 'alert-success');
            request()->session()->flash('message', 'Your password updated successfully.');
            return redirect()->back();

        }
    }


}

<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use App\Requirement;
use App\RequirementAdditional;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Bid;
use App\Mail\ContactUs;
use App\NewsletterSubscription;
use Validator;



class CustomerController extends Controller
{
    public function dashboard()
    {
        $users = User::where('id', Auth::user()->id)->get();
        return view('tenant.customers.dashboard', compact('users'));
    }

    public function setRequirement(Request $request)
    {

        $requirement= Requirement::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'product_id' => $request->product_id ? : null
        ]);
        RequirementAdditional::create(['requirement_id'=>$requirement->id,'attachment'=>$request->attachment]);
        return json_encode(array("success"=>true,"error_code"=>0,"status"=>true));
    }

    public function getRequirement()
    {
        $requirements = Requirement::where('user_id', Auth::user()->id)->get();
        return json_encode(array("success"=>true,"error_code"=>0,"status"=>false, "data"=>$requirements->toArray()));
    }

    public function getProfile()
    {
        $users = User::where('id', Auth::user()->id)->get();
        return json_encode(array("success"=>true,"error_code"=>0,"status"=>false, "data"=>$users->toArray()));
    }

    public function updatePassword()
    {
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

        $response = [
            'status' => true,
            'error_code' => 0,
            'message' => '',
            'error' => [],
            'results' => []
        ];

        if (isset($validator) && count($validator) === 0)
        {
            $response['status'] = false;
            $response['error_code'] = 1;
            $response['error'] = $validator->errors()->all();

            return response()->json($response);
        }
        $response = [
            'status' => true,
            'error_code' => 0,
            'message' => '',
            'error' => [],
            'results' => []
        ];

        $user->password = Hash::make(request()->new_password);
        $user->save();
        request()->session()->flash('alert-class', 'alert-success');
        $response['status'] = false;
        $response['error_code'] = 0;
        $response['message'] = 'Requirement has been posted successfully.';
        return response()->json($response);

    }
    public function uploadProfileImg(Request $request)
    {
        $validator = $this->validate(
            request(),
            [
                'attachment' => 'required|image:jpg,png,gif,jpeg'
            ]
        );
        $response = [
            'status' => true,
            'error_code' => 0,
            'message' => '',
            'error' => [],
            'results' => []
        ];
        if (isset($validator) && count($validator) === 0) {
            $response['status'] = false;
            $response['error_code'] = 1;
            $response['error'] = $validator->errors()->all();
            return response()->json($response);
        }
        $img_dest = public_path('img/userprofile');
        if ($file = $request->file('attachment')) {
            $exist_img = isset(auth()->user()->profile_img) ? auth()->user()->profile_img : '';
            $name = $file->getClientOriginalName();
            try {
                $file->move($img_dest, $name);
                if (isset($exist_img) && file_exists($img_dest.'/'.$exist_img) && is_file($img_dest.'/'.$exist_img)) {
                    unlink($img_dest.'/'.$exist_img);
                }
                $profileImg = User::find(Auth::user()->id);
                $profileImg->profile_img = $name;
                $profileImg->save();
                $response['message'] = 'Profile picture updated successfully.';
                return response()->json($response);
            } catch (\Exception $e) {
                $response['status'] = false;
                $response['error_code'] = 1;
                $response['message'] = $e->getMessage();
                return response()->json($response);
            }
        }
        else {
            $response['status'] = false;
            $response['error_code'] = 1;
            $response['message'] = 'Please select file.';
            return response()->json($response);
        }
    }

    public function updateProfileText()
    {
        $validator = $this->validate(
            request(),
            [
                'name' => 'required',
                'phone' => 'required'
            ]

        );
        $response = [
            'status' => true,
            'error_code' => 0,
            'message' => '',
            'error' => [],
            'results' => []
        ];

        if (isset($validator) && count($validator) === 0) {
            $response['status'] = false;
            $response['error_code'] = 1;
            $response['error'] = $validator->errors()->all();
            return response()->json($response);
        }
        $profileImg = User::find(Auth::user()->id);
        $profileImg->name = request()->name;
        $profileImg->phone = request()->phone;
        $profileImg->save();

        $response['message'] = 'Profile updated successfully.';
        return response()->json($response);
    }


    public function getBannerData()
    {
        $req_count = Requirement::count();
        $usr_req_count = Requirement::where('user_id',Auth::user()->id)->count();
        $req_per = $req_count == 0 ? 0 : round(($usr_req_count/$req_count)*100);

        $bid_count = Bid::count();
        $usr_bid_count = Bid::where('user_id',Auth::user()->id)->count();

        $bid_per =$bid_count == 0 ? 0 : round(($usr_bid_count/$bid_count)*100);

        $response=array();
        $response['req_per'] = $req_per;
        $response['bid_per'] = $bid_per;
        echo json_encode($response);
        exit;
    }
    public function listNotification(){
        $all_notification = Notification::with('fromUser')->where('to_user_id', auth()->user()->id)
            ->where('type','!=','bid_placed')
            ->orWhereNull('type')
            ->paginate(10);
        /* $all_notification = $all_notification->reject(function ($noti){
            return $noti->type=="bid_placed";
         });*/
        return view('tenant.customers.includes.notification', compact('all_notification'));
    }

    public function joinNewsletter(){

        $email = request()->email;
        $arr_data['email'] = $email;
        $validator = validator::make(
            request()->all(),
            [
                'email' => 'required|email'
            ],
            [
                'email.required' => 'Please enter email.',
                'email.email' => 'Please enter valid email.'
            ]
        );
        $response = [
            'error' => [],
            'message' => []
        ];

        if ($validator->fails()) {
            $response['error'] = $validator->errors()->all();
            $response['message'] = $validator->messages()->all();
            return response()->json($response);
        }

        Mail::send('emails.email-subscription', $arr_data, function($message) use ($email)
        {

            $message->to($email)->subject('Newsletter subscribtion');
        });
        if(auth()->check()){
            $user_id = auth()->user()->id;
        }else{
            $user_id = 0;
        }
        $existing_email = NewsletterSubscription::where('email',$email)->first();
        if($existing_email){
            $response['error'] = ['mail field already exist'];
            $response['message'] = "Mail already exist.";
            return response()->json($response);
        }else{
            NewsletterSubscription::create(['email'=>$email, 'user_id' => $user_id, 'status' => 1]);
            $response['success'] = ['mail subscribed successfully'];
            $response['message'] = "Mail subscribed successfully.";
            return response()->json($response);
        }
    }
    public function getDashboardProfile()
    {
        $user = User::find(auth()->user()->id);
        return view('customers.profile', compact('user'));
    }
    public function updateDashboardProfile()
    {

        $this->validate(
            request(),
            [
                'name' => 'required',
                'phone' => 'required'
            ]
        );

        $user = User::find(auth()->user()->id);
        $user->name = request()->name;
        $user->phone = request()->phone;
        $user->save();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Message sent successfully.');
        return redirect()->back();

    }
    public function getSetting()
    {
        return view('tenant.customers.setting');
    }
    public function updateSetting()
    {
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

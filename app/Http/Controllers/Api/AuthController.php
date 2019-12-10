<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use App\Helpers\GeneralHelper;
use App\Mail\WelcomeMail;
use App\User;
use Illuminate\Http\Request;
use \Illuminate\Http\Response as Res;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //function for login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $response = ApiHelper::responseArray();

        if ($validator->fails()) {
            $response['status'] = Res::HTTP_BAD_REQUEST;
            $response['error_code'] = 1;
            $response['response_time'] = microtime(true) - LARAVEL_START;
            $response['message'] = 'Please check your input(s)';
            $response['error'] = $validator->errors()->all();
            return response()->json($response, Res::HTTP_OK);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            if ($user->email_verified === 0) {
                $response['status'] = Res::HTTP_UNAUTHORIZED;
                $response['response_time'] = microtime(true) - LARAVEL_START;
                $response['error_code'] = 1;
                $response['message'] = 'Your account is not verified yet, please click on activation link sent on your mail.';
                $response['request'] = $request->all();
                return response()->json($response, Res::HTTP_OK);
            }
            if ($user->account_status !== '1') {
                $response['status'] = Res::HTTP_UNAUTHORIZED;
                $response['response_time'] = microtime(true) - LARAVEL_START;
                $response['error_code'] = 1;
                $response['message'] = 'Your account is inactive or blocked, please contact to our administrator.';
                $response['request'] = $request->all();
                return response()->json($response, Res::HTTP_OK);
            }
            $user->api_token = isset($request->api_token) ? $request->api_token : null;
            $user->device_type = isset($request->device_type) ? $request->device_type : null;
            $user->save();

            $response['status'] = Res::HTTP_OK;
            $response['response_time'] = microtime(true) - LARAVEL_START;
            $response['message'] = 'Logged in Successfully';
            $response['results'] = $user;
            return response()->json($response, Res::HTTP_OK);
        }

        $response['status'] = Res::HTTP_BAD_REQUEST;
        $response['response_time'] = microtime(true) - LARAVEL_START;
        $response['error_code'] = 1;
        $response['message'] = 'Invalid login credentials, please try again.';
        $response['request'] = $request->all();
        return response()->json($response, Res::HTTP_OK);

    }

    /**
     * Auth register
     *
     * @var view
     */
    public function customerRegistration(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => ['required', 'string', 'max:255'],
//                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
                'phone' =>'required'
            ]
        );

        $response = ApiHelper::responseArray();

        if ($validator->fails()) {
            $response['status'] = Res::HTTP_BAD_REQUEST;
            $response['error_code'] = 1;
            $response['response_time'] = microtime(true) - LARAVEL_START;
            $response['message'] = 'Please check your input(s)';
            $response['error'] = $validator->errors()->all();
            return response()->json($response, Res::HTTP_OK);
        }

        if (isset($request) && $request->email != '' && $request->password) {
            $exist_user = User::where('email', $request->email)
                ->first();
            if (isset($exist_user)) {
                $response['status'] = 401;
                $response['response_time'] = microtime(true) - LARAVEL_START;
                $response['error_code'] = 1;
                $response['message'] = 'This email already taken, please choose another.';
                $response['request'] = $request->all();
                return response()->json($response, 200);
            }
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->email_verified = false;
            $user->account_status = '0';
            $user->activation_code = GeneralHelper::generateReferenceNumber();
            $user->password = Hash::make($request->password);
            $user->role = 4;
            $user->save();
            $user_id = $user->id;

            $user->activation_link = route('verify-user-email', $user->activation_code);
            Mail::to($user->email)->send(new WelcomeMail($user));

            $response['status'] = Res::HTTP_OK;
            $response['response_time'] = microtime(true) - LARAVEL_START;
            $response['message'] = "Please check your e-mail address and click on the link sent to you. If you can not find the mail in the inbox, check the Jump/Spam Box";
            $response['results'] = $user;
            return response()->json($response, Res::HTTP_OK);
        }

        $response['status'] = Res::HTTP_BAD_REQUEST;
        $response['response_time'] = microtime(true) - LARAVEL_START;
        $response['error_code'] = 1;
        $response['message'] = 'Please check your input(s).';
        $response['request'] = $request->all();

        return response()->json($response, Res::HTTP_OK);
    }
    public function verifyEmail(Request $request)
    {
        $exist_user = User::where('email', $request->email)->first();
        if(!$exist_user ){
            $response['status'] = 401;
            $response['response_time'] = microtime(true) - LARAVEL_START;
            $response['error_code'] = 1;
            $response['message'] = 'We can not find a user with that e-mail address.';
            return response()->json($response, 200);
        }else{
            $toEmail = request()->email;
            $arr_data['reset_url'] = "data";
            Mail::send('emails.reset-password', $arr_data, function($message) use ($toEmail)
            {
                $message->to($toEmail)
                    ->subject('Reset Password Notification');
            });
            $response['status'] = Res::HTTP_OK;
            $response['response_time'] = microtime(true) - LARAVEL_START;
            $response['message'] = "We have e-mailed your password reset link!.";
            return response()->json($response, Res::HTTP_OK);
        }
    }


}

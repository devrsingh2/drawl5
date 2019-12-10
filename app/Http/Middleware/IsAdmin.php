<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
//            request()->user()->role;
            if (request()->user()->role == '3' || request()->user()->role == '4') {
                abort('403', 'Unauthorized action.');
            } else if (request()->user()->role != '3' || request()->user()->role != '4') {
                if ($request->user()->account_status == '0') {
                    session()->flush();
                    session()->flash('alert-class', 'alert-danger');
                    session()->flash('message', "Your account is inactive, Please contact your administrator.");
                    return redirect(route('login'));
                }
                if (request()->segment(2) != NULL) {
                    if (request()->user()->role !== 1) {
                        $arr_user_permission = [];
                        $all_permission = request()->user()->userRole->hasPermission;
                        foreach ($all_permission as $key => $value) {
                            $arr_user_permission[] = $all_permission{$key}->getPermission->module;
                        }
                        if (isset($all_permission) && count($all_permission) > 0) {
                            if (!in_array(request()->segment(2), $arr_user_permission)) {
                                abort('403', 'Unauthorized action.');
                            }
                        } else {
                            abort('403', 'Unauthorized action.');
                        }
                    }
                }
            }
        } else {
            return redirect(route('login'));
        }
        return $next($request);
    }
}
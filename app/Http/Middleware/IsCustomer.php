<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class IsCustomer
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
            if (request()->user()->role != '4') {
//                abort('403', 'Unauthorized action.');
                request()->session()->flash('alert-class', 'alert-danger');
                request()->session()->flash('message', 'You are not authorize to access this page.');
                return redirect(url('/'));
            }
        }
        /*else {
            return redirect(route('login'));
        }*/
        return $next($request);
    }
}
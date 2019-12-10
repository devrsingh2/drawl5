<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class IsVendor
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
//        dd(request()->user()->role);
        if (Auth::check()) {
            if (request()->user()->role != '3') {
                abort('403', 'Unauthorized action.');
            }
        }
        /*else {
            return redirect(route('login'));
        }*/
        return $next($request);
    }
}
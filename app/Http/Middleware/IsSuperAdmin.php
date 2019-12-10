<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class IsSuperAdmin
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
        if (!$request->session()->has('userdata')) {
            $request->session()->flash('alert-class', 'alert-danger');
            $request->session()->flash('message', 'Please login to proceed further.');
            return redirect()->guest(route('admin.login'));
        }
        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        //if utype is admin view all route else if editor view only admin route
        if (Auth::user()->utype === 'Admin') {
            return $next($request);
        } else {
            session()->flush();
            return \redirect()->route('admin.dashboard');
        }
    }
}

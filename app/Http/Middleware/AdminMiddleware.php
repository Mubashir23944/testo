<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (!Auth::check() || !(Auth::user()->hasRole('super admin') || Auth::user()->hasRole('manager')) || !Auth::user()->status) {
            Auth::logout();
            return redirect('/login')->with('error', 'Access Restricted By Admin');
        }

        return $next($request);
    }
}

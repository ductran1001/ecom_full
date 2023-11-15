<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (!auth()->check()) {
            return redirect()->route('get.admin.login')->with('error', 'You need to log in to access this page.');
        }

        if (auth()->user()->role != 2) {
            auth()->logout();
            return redirect()->route('get.admin.login')->with('error', 'You can not access this page.');
        }

        return $next($request);
    }
}

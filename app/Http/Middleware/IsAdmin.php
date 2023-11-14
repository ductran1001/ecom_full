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
            toastr()->error('Bạn cần đăng nhập để truy cập trang này.');
            return redirect()->route('get.admin.login');
        }

        if (auth()->user()->role != 3) {
            auth()->logout();
            toastr()->error('Bạn không có quyền truy cập trang này.');
            return redirect()->route('get.admin.login');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra xem người dùng đã đăng nhập không
        if (!Auth::guard('user')->check()){
            return redirect()->back()->with('error','Bạn cần đăng nhập để truy cập trang này!');
        }
        
        return $next($request);
    }
}

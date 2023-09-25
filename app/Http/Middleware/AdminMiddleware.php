<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function __construct(){

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , ...$roles): Response
    {
        
        // Kiểm tra xem người dùng đã đăng nhập không
        // dd($roles);
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.auth.login');
        }

         // Kiểm tra xem người dùng có trong danh sách các vai trò được phép không
        if (!in_array(Auth::guard('admin')->user()->role, $roles)) {
            return redirect()->route('admin.auth.login')->with('error', 'Bạn không có quyền truy cập vào trang này');
        }



        return $next($request);

    }
}

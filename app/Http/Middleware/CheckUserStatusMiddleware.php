<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        // Kiểm tra xem người dùng đã đăng nhập không
        // dd($roles);
        if (Auth::guard('user')->check()) {
            // Lấy người dùng hiện tại đã đăng nhập
            $user = Auth::guard('user')->user();

            //Kiểm tra người dùng còn trong db và bị khóa không
            $dbUser = User::find($user->id);
            
            if (!$dbUser) {
                Auth::guard('user')->logout();
            } else if ($user->status == 0) {
                Auth::guard('user')->logout();
            }
        }
        return $next($request);
    }
}

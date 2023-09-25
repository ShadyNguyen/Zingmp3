<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //
    public function login()
    {
        if (Auth::guard('admin')->check()){
            // dd(Auth::user());
            return redirect()->route('admin.dashboard');
        }
        
        return view('pages.admin.login');
    }
    public function checkLogin(LoginRequest $request)
    {

        // dd($request->only('username', 'password'));
        // dd(Auth::guard('admin')->attempt($request->only('username', 'password')));
        if (!Auth::guard('admin')->attempt($request->only('username', 'password'))) {
            return redirect()->back()->with('error', 'Đăng nhập thất bại!');
        }else{
            return redirect()->route('admin.dashboard');
        }

    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }
}

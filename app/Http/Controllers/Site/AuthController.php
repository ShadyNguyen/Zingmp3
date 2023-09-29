<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuthRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::guard('user')->check()) {
            return redirect()->back();
        }

        return view('pages.site.login');
    }
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->back();
    }
    public function loginAjax(AuthRequest $request)
    {
        if (Auth::guard('user')->check()) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Đăng nhập không hợp lệ!'
            ], 403);
        }
        $check = Auth::guard('user')->attempt($request->only('username', 'password'));

        if (!$check) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Sai thông tin đăng nhập!'
            ], 401);
        }

        if (Auth::guard('user')->user()->status == 0) {
            Auth::guard('user')->logout();
            return response()->json([
                'error' => 'Forbidden',
                'message' => 'Tài khoản của bạn đã bị khóa!'
            ], 403);
        }

        return response()->json([
            'message' => 'Đăng nhập thành công!',
            'username' => Auth::guard('user')->check()
        ], 200);
    }
    public function register(Request $request)
    {


        $validator = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'name'  =>   'required'

        ], [
            'username.unique' => 'Tài khoản đã được sử dụng!',
            'required' => 'Nhập thiếu thông tin!'
        ]);
        
        $username = $request->username;
        $password = $request->password;
        $name = $request->name;
        $results = DB::select("SELECT get_new_id('user') AS newId");
        $new_id = $results[0]->newId;
        
        User::create(['id' => $new_id, 'username' => $username, 'password' => bcrypt($password), 'role' => 'user', 'name' => $name, 'slug' => $new_id]);
        Auth::guard('user')->attempt($request->only('username', 'password'));
        return response()->json([], 204);
    
    }
}

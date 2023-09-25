<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('admin',['except' => ['dashboard']]);
        // $this->middleware('nv');
    }
    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }
    public function onlyAdmin(){
        return 'onlyAdmin';
    }
    
}

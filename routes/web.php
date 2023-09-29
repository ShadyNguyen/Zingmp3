<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin;
use App\Http\Controllers\Site;

use App\Models\User;


/*

Route::get('/kkk', function () {
    User::create(['id'=>'nv1','username' => 'nv','password'=>bcrypt('nv'),'role' => 'nv','name' =>'nv']);
});

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post('/loginAjax', [Site\AuthController::class, 'loginAjax']);
Route::get('/logout', [Site\AuthController::class, 'logout'])->name('site.auth.logout');
Route::post('/registerAjax', [Site\AuthController::class, 'register'])->name('site.auth.register');





Route::get('admin/login', [Admin\AuthController::class, 'login'])->name('admin.auth.login');
Route::post('admin/login', [Admin\AuthController::class, 'checkLogin'])->name('admin.auth.login');
Route::get('admin/logout', [Admin\AuthController::class, 'logout'])->name('admin.auth.logout');

// Route::get('/admin', [Admin\HomeController::class, 'dashboard'])->name('admin.dashboard');
Route::group(['prefix' => 'admin','middleware'=>'admin:admin,nv'], function () {
    Route::get('/', [Admin\HomeController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::get('/onlyadmin', [Admin\HomeController::class, 'onlyAdmin'])->name('admin.onlyAdmin')->withoutMiddleware('admin:admin,nv')->middleware(('admin:admin'));

});
Route::get('/', [Site\HomeController::class, 'home'])->name('site.home');

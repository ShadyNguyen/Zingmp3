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
//login user
Route::post('/loginAjax', [Site\AuthController::class, 'loginAjax']);
Route::get('/logout', [Site\AuthController::class, 'logout'])->name('site.auth.logout');
Route::post('/registerAjax', [Site\AuthController::class, 'register'])->name('site.auth.register');

//login admin
Route::get('admin/login', [Admin\AuthController::class, 'login'])->name('admin.auth.login');
Route::post('admin/login', [Admin\AuthController::class, 'checkLogin'])->name('admin.auth.login');
Route::get('admin/logout', [Admin\AuthController::class, 'logout'])->name('admin.auth.logout');

//tim kiem user
Route::group(['prefix' => 'tim-kiem'], function () {
    Route::get('/tat-ca', [Site\HomeController::class, 'searchAll'])->name('site.search.all');
    Route::get('/bai-hat', [Site\HomeController::class, 'searchSong'])->name('site.search.song');
    Route::get('/nghe-si', [Site\HomeController::class, 'searchArtist'])->name('site.search.artist');
    Route::get('/playlisy', [Site\HomeController::class, 'searchPlaylist'])->name('site.search.playlist');
});

//mymusic
Route::group(['prefix' => 'mymusic','middleware'=>'user'], function () {
    Route::get('/history/{type}', [Site\UserController::class, 'history'])->name('site.mymusic.history');

});

//artist
Route::group(['prefix' => 'nghe-si'], function () {
    Route::get('{aritistSlug}/album', [Site\HomeController::class, 'albumArtist'])->name('site.artist.album');

    Route::get('{aritistSlug}/bai-hat', [Site\HomeController::class, 'songArtist'])->name('site.artist.song');
    Route::get('{aritistSlug}', [Site\HomeController::class, 'homeArtist'])->name('site.artist.home');

    

});



// Route::get('/admin', [Admin\HomeController::class, 'dashboard'])->name('admin.dashboard');
Route::group(['prefix' => 'admin','middleware'=>'admin:admin,nv'], function () {
    Route::get('/', [Admin\HomeController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/onlyadmin', [Admin\HomeController::class, 'onlyAdmin'])->name('admin.onlyAdmin')->withoutMiddleware('admin:admin,nv')->middleware(('admin:admin'));

});

Route::get('/', [Site\HomeController::class, 'home'])->name('site.home');

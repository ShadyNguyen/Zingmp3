<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/likeSong', [Site\SongController::class, 'likeSong']);
Route::get('/getSongById', [Site\SongController::class, 'getSongById']);
Route::get('/getSourceById', [Site\SongController::class, 'getSourceById']);

Route::post('/followArtist', [Site\SongController::class, 'followArtist']);


Route::post('/addPlayList', [Site\SongController::class, 'addPlayList']);
Route::post('/editPlaylist', [Site\SongController::class, 'editPlayList']);

Route::post('/deletePlayList', [Site\SongController::class, 'deletePlayList']);
Route::post('/likePlayList', [Site\SongController::class, 'likePlayList']);


Route::post('/addSongToPlayList', [Site\SongController::class, 'addSongToPlayList']);
Route::get('/deleteSongFromPlayList', [Site\SongController::class, 'deleteSongFromPlayList']);
Route::get('/getSongByArtist', [Site\SongController::class, 'getSongByArtist']);
Route::get('/getSongByPlaylist', [Site\SongController::class, 'getSongByPlaylist']);

Route::get('/upListensSong', [Site\SongController::class, 'upListensSong']);



Route::post('/register', [Site\AuthController::class, 'register']);

Route::get('/admin/tableUser',[Site\SongController::class, 'adminTableUser']);

// Route::post('/loginAjax', [Site\AuthController::class, 'loginAjax'])->name('site.auth.loginAjax');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

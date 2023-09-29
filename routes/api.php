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
Route::post('/followArtist', [Site\SongController::class, 'followArtist']);
Route::post('/addPlayList', [Site\SongController::class, 'addPlayList']);
Route::post('/deletePlayList', [Site\SongController::class, 'deletePlayList']);




Route::post('/register', [Site\AuthController::class, 'register']);

// Route::post('/loginAjax', [Site\AuthController::class, 'loginAjax'])->name('site.auth.loginAjax');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

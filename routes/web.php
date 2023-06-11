<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\Anime_userController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\GoogleLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(AnimeController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/ranking', 'ranking')->name('ranking');
    Route::get('/board', 'board')->name('board');
    Route::get('/search', 'search_get')->name('animes.search_get');
    Route::post('/search', 'search_post')->name('animes.search_post');
    Route::get('/search/re', 'search_session')->name('search.session');
    Route::post('/search/re', 'search')->name('search.post');
    Route::get('/edit/{anime}', 'edit')->name('animes.edit');
    Route::post('/edit', 'edit_post')->name('animes.edit_post');
    Route::get('/detail/{anime}', 'detail')->name('animes.detail');
    Route::delete('/detail/{anime}', 'delete')->name('animes.delete');
    Route::get('/edit_like/{anime}', 'edit_like')->name('animes.edit_like');
    Route::get('/edit_unlike/{anime}', 'edit_unlike')->name('animes.edit_unlike');
    Route::get('/detail_like/{anime}', 'detail_like')->name('animes.detail_like');
    Route::get('/detail_unlike/{anime}', 'detail_unlike')->name('animes.detail_unlike');
    Route::get('/index_like/{anime}', 'index_like')->name('animes.index_like');
    Route::get('/index_unlike/{anime}', 'index_unlike')->name('animes.index_unlike');
    Route::get('/search_like/{anime}', 'search_like')->name('animes.search_like');
    Route::get('/search_unlike/{anime}', 'search_unlike')->name('animes.search_unlike');
    Route::get('/ranking_like/{anime}', 'ranking_like')->name('animes.ranking_like');
    Route::get('/ranking_unlike/{anime}', 'ranking_unlike')->name('animes.ranking_unlike');
});

Route::get('Auth/login', [AuthenticatedSessionController::class, "guestLogin"])->name('login.guest');

require __DIR__.'/auth.php';

// googleへのリダイレクト
Route::get('/auth/google', [GoogleLoginController::class, 'redirectToGoogle']);
// 認証後の処理_リダイレクトURIと一致
Route::get('/auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);
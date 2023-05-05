<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function() {
    return view('anime_users/index');
});
//Route::get('/search', function() {
  //  return view('anime_users/search');
//});
Route::get('/ranking', function() {
    return view('anime_users/ranking');
});
Route::get('/board', function() {
    return view('anime_users/board');
});
Route::get('/edit', function() {
    return view('anime_users/edit');
});

Route::get('/edit/{anime}', [AnimeController::class, 'edit'])->name('animes.edit');
Route::get('/search', [AnimeController::class, 'search_get'])->name('animes.search_get');
Route::post('/search', [AnimeController::class, 'search_post'])->name('animes.search_post');
Route::get('/search/re', [AnimeController::class, 'search_session'])->name('search.session');
Route::post('search/re', [AnimeController::class,'search'])->name('search.post');
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;

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
    Route::get('/edit/{anime}', 'edit')->name('animes.edit');
    Route::get('/search', 'search_get')->name('animes.search_get');
    Route::post('/search', 'search_post')->name('animes.search_post');
    Route::get('/search/re', 'search_session')->name('search.session');
    Route::post('/search/re', 'search')->name('search.post');
});

require __DIR__.'/auth.php';

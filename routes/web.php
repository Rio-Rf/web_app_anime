<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/search', function() {
    return view('anime_users/search');
});
Route::get('/ranking', function() {
    return view('anime_users/ranking');
});
Route::get('/board', function() {
    return view('anime_users/board');
});
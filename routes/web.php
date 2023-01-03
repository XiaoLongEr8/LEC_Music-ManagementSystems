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
    return view('pages.home');
});

Route::get('/result', function () {
    return view('pages.searchResult');
});

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/admin', function () {
    return view('admin.home_admin');
});

Route::get('/admin-artist', function () {
    return view('admin.artist_admin');
});

Route::get('/auth/redirect', [LoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('google.login');

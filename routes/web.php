<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtistEditReqController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SongCreateReqController;
use App\Http\Controllers\SongEditReqController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::get('/register', [RegisterController::class, 'goToRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/auth/redirect', [LoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('google.login');

// Guest features
Route::get('/search', [SongController::class, 'search'])->name('search');
Route::get('/artist/show/{id}', [ArtistController::class, 'show'])->name('artist.show');
Route::get('/song/show/{id}', [SongController::class, 'show'])->name('song.show');
Route::post('/like-dislike', [SongController::class, 'updateLike']);

Route::middleware(['auth'])->group(function () {
    Route::get('/request/create-song', function () {
        return view('pages.requestSong');
    })->name('song.create.req');

    Route::get('/request/edit-song/{id}', [SongEditReqController::class, 'goToForm'])->name('song.edit.req');

    Route::get('/request/edit-artist/{id}', [ArtistEditReqController::class, 'goToForm'])->name('artist.edit.req');

    Route::post('/request/create-song', [SongCreateReqController::class, 'create'])->name('create.song.req');
    Route::post('/request/edit-song', [SongEditReqController::class, 'create'])->name('edit.song.req');
    Route::post('/request/edit-artist', [ArtistEditReqController::class, 'create'])->name('edit.artist.req');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [SongController::class, 'displayAll'])->name('admin.songs');

    Route::get('/admin-artist', [ArtistController::class, 'displayAll'])->name('admin.artists');
});

Route::get('/profile', function () {
    return view('pages.profileDetail', [
        'user' => auth()->user()
    ]);
});

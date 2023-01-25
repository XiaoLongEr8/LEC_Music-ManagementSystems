<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtistEditReqController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SongCreateReqController;
use App\Http\Controllers\SongEditReqController;
use App\Http\Controllers\UserController;
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
Route::get('/login', [LoginController::class, 'redirectLogin'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::get('/register', [RegisterController::class, 'redirectRegister'])->name('register');
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

    Route::get('/request/edit-song/{id}', [SongEditReqController::class, 'redirectForm'])->name('song.edit.req');

    Route::get('/request/edit-artist/{id}', [ArtistEditReqController::class, 'redirectForm'])->name('artist.edit.req');

    Route::post('/request/create-song', [SongCreateReqController::class, 'create'])->name('create.song.req');
    Route::post('/request/edit-song', [SongEditReqController::class, 'create'])->name('edit.song.req');
    Route::post('/request/edit-artist', [ArtistEditReqController::class, 'create'])->name('edit.artist.req');

    Route::get('/profile', [UserController::class, 'redirectProfile'])->name('profile');
    Route::put('/profile/edit/pic', [UserController::class, 'editPic'])->name('profile.edit.pic');
    Route::put('/profile/edit/info', [UserController::class, 'edit'])->name('profile.edit.info');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [SongController::class, 'displayAll'])->name('admin.songs');

    Route::get('/admin-artist', [ArtistController::class, 'displayAll'])->name('admin.artists');

    Route::get('/add-song', [SongController::class, 'redirectCreate'])->name('redirect.create.song');
    Route::post('/add-song', [SongController::class, 'create'])->name('create.song');
    Route::post('/delete-song/{id}', [SongController::class, 'destroy'])->name('delete.song');
    Route::get('/edit-song/{id}', [SongController::class, 'redirectEdit'])->name('redirect.edit.song');
    Route::patch('/edit-song', [SongController::class, 'edit'])->name('edit.song');

    Route::get('/add-artist', [ArtistController::class, 'redirectCreate'])->name('redirect.create.artist');
    Route::post('/add-artist', [ArtistController::class, 'create'])->name('create.artist');
    Route::post('/delete-artist/{id}', [ArtistController::class, 'destroy'])->name('delete.artist');
    Route::get('/edit-artist/{id}', [ArtistController::class, 'redirectEdit'])->name('redirect.edit.artist');
    Route::patch('/edit-artist', [ArtistController::class, 'edit'])->name('edit.artist');

    Route::get('/add-album', [AlbumController::class, 'redirectCreate'])->name('redirect.create.album');
    Route::post('/add-album', [AlbumController::class, 'create'])->name('create.album');
});



<?php

use App\Http\Controllers\admins\UserController;
use App\Http\Controllers\admins\ComicController;
use App\Http\Controllers\admins\CommentController;
use App\Http\Controllers\admins\BookmarkController;
use App\Http\Controllers\admins\RatingController;
use App\Http\Controllers\admins\ChapterController;
use App\Http\Controllers\admins\GenreController;
use App\Http\Controllers\admins\ComicGenreController;
use App\Http\Controllers\admins\HistoryController;
use App\Http\Controllers\admins\ReadlistController;
use App\Http\Controllers\admins\TypeController;
use App\Http\Controllers\admins\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auths.login');
});

Route::get('/register', function () {
    return view('auths.register');
});

Route::get('/dashboard/admin', function () {
    return view('admins.dashboard');
})->name('dashboard');

Route::resource('users', UserController::class);

Route::resource('comics', ComicController::class);

Route::resource('comments', CommentController::class);

Route::resource('bookmarks', BookmarkController::class);

Route::resource('ratings', RatingController::class);

Route::resource('chapters', ChapterController::class);

Route::resource('genres', GenreController::class);

Route::resource('histories', HistoryController::class);

Route::resource('readlist', ReadlistController::class);

Route::resource('comic-genres', ComicGenreController::class);

Route::resource('types', TypeController::class);

Route::resource('roles', RoleController::class);
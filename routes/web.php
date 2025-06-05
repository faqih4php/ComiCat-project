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
use App\Http\Controllers\admins\PageController;
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

// Pages routes
Route::resource('chapters.pages', PageController::class);
Route::post('chapters/{chapter}/pages/reorder', [PageController::class, 'reorder'])->name('pages.reorder');

// Other resource routes
Route::resource('users', UserController::class);
Route::resource('comics', ComicController::class);
Route::resource('comics.chapters', ChapterController::class)->only(['create', 'store', 'index']);
Route::resource('chapters', ChapterController::class)->except(['create', 'store']);
Route::resource('comments', CommentController::class);
Route::resource('bookmarks', BookmarkController::class);
Route::resource('ratings', RatingController::class);
Route::resource('genres', GenreController::class);
Route::resource('histories', HistoryController::class);
Route::resource('readlist', ReadlistController::class);
Route::resource('comic-genres', ComicGenreController::class);
Route::resource('types', TypeController::class);
Route::resource('roles', RoleController::class);

// Comments Routes
// Route::middleware(['auth'])->group(function () {
//     Route::resource('comments', CommentController::class);
//     Route::get('comics/{comic}/comments', [CommentController::class, 'getComicComments'])->name('comics.comments');
//     Route::get('chapters/{chapter}/comments', [CommentController::class, 'getChapterComments'])->name('chapters.comments');
// });

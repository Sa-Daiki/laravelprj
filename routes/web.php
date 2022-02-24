<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ArticleEditController;
use App\Http\Controllers\ArticleLikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\QuestionController;
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
Route::resource('articles', ArticleController::class)->middleware('auth');
                                                                        // ->except(['index']);
Route::resource('article_edits', ArticleEditController::class)->middleware('auth');
Route::resource('article_likes', ArticleLikeController::class)->middleware('auth');
Route::resource('comments', CommentController::class)->middleware('auth');
Route::resource('photos', PhotoController::class);
Route::resource('questions', QuestionController::class);
Route::resource('tags', TagController::class);
Route::resource('users', UserController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::view('/', '/logouts');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


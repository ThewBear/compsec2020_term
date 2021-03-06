<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [HomeController::class, 'showLogin']);

Route::get('/logout', [HomeController::class, 'doLogout']);

Route::get('/login', [HomeController::class, 'showLogin']);
Route::post('/login', [HomeController::class, 'doLogin']);

Route::get('/posts', [PostController::class, 'showPost']);
Route::post('/posts', [PostController::class, 'doPost']);
Route::patch('/posts', [PostController::class, 'updatePost']);
Route::delete('/posts', [PostController::class, 'deletePost']);

Route::post('/comment', [CommentController::class, 'doComment']);
Route::patch('/comment', [CommentController::class, 'updateComment']);

Route::fallback([HomeController::class, 'doLogin']);
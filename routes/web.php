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

Route::view('/login', 'login');
Route::view('/posts', 'posts', ['posts' => array(
    ['author' => 'John', 'content' => 'Hi Jane!', 'comments'=> array(
        ['author' => 'Jane', 'content' => 'I love Computer Security']
    )],
    ['author' => 'Jane', 'content' => 'Hello, John!']
)]);

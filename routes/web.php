<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\payOrderController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Str;
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
    dd(Str::partNumber('1254632576'));

    return view('welcome');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{product}', [ProductController::class, 'show']);

Route::post('/books', [BooksController::class, 'store']);
Route::patch('/books/{book}', [BooksController::class, 'update']);

Route::delete('/books/{book}', [BooksController::class, 'destroy']);

Route::post('/author', [AuthorsController::class, 'store']);

Route::get('pay',[payOrderController::class , 'store']);
Route::get('channels',[ChannelController::class , 'index']);

Route::get('post/create',[PostController::class , 'create']);


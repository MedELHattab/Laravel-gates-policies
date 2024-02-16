<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/gate', [AuthorizationController::class, 'index'])->name('gate');

Route::get('posts', [PostController::class, 'index'])->name('post.index');

Route::get('posts/{post}', [PostController::class, 'show'])->name('post.show')->middleware('can:view,post');

Route::get('posts/delete/{post}', [PostController::class, 'destroy'])->name('post.destroy')->middleware('can:delete,post');



 
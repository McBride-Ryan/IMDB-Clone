<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', [MoviesController::class, 'index'])->name('index')->middleware('auth');
Route::get('/movie/{id}', [MoviesController::class, 'show'])->name('movie');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);

//Route::get('/actors', [ActorsController::class, 'index'])->name('actors.index');
//Route::get('/actors/{actor}', [ActorsController::class, 'show'])->name('movie');

//Route::get('/movies', function () {
//    return view('details');
//})->name('movies');

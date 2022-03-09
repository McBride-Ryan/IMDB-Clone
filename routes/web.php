<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', [MoviesController::class, 'index'])->name('index');
Route::get('/movie/{id}', [MoviesController::class, 'show'])->name('movie');

//Route::get('/actors', [ActorsController::class, 'index'])->name('actors.index');
//Route::get('/actors/{actor}', [ActorsController::class, 'show'])->name('movie');

//Route::get('/movies', function () {
//    return view('details');
//})->name('movies');

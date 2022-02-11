<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MoviesController::class, 'index'])->name('index');
Route::get('/movie/{id}', [MoviesController::class, 'show'])->name('movie');

//Route::get('/movies', function () {
//    return view('details');
//})->name('movies');

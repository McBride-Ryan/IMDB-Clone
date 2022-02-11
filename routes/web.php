<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MoviesController::class, 'index'])->name('index');

//Route::get('/', function () {
//    return view('index');
//})->name('index');

Route::get('/movies', function () {
    return view('details');
})->name('movies');

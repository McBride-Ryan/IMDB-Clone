<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.www.themoviedb.org/3/movie/popular')
            ->json();

//        dd($popularMovies);

        return view('index');
    }
}

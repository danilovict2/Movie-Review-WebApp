<?php

namespace App\Http\Controllers;


class MovieController extends Controller{

    public function index(int $movie_id){
        $movie = app('App\Http\Controllers\APIController')->getMovie($movie_id);
        $directorsAndWriters = app('App\Http\Controllers\APIController')->getMovieCrew($movie_id);
        return view('movies.index', compact('movie','directorsAndWriters'));
    }
}

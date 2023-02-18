<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller{
    public function show($movie_id){
        $movie = app('App\Http\Controllers\APIController')->getMovie($movie_id);
        $directorsAndWriters = app('App\Http\Controllers\APIController')->getMovieCrew($movie_id);
        return view('movies.show',compact('movie','directorsAndWriters'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller{

    public function getMovieImage($movie_id){
        $image = Http::get("https://api.themoviedb.org/3/movie/$movie_id?api_key=0f8f78481e1b862ddd21d86a35dc909d");
        return $image['poster_path'] ?? 0;
    }

    public function getMovie($movie_id){
        return Http::get("https://api.themoviedb.org/3/movie/$movie_id?api_key=0f8f78481e1b862ddd21d86a35dc909d");
    }
}

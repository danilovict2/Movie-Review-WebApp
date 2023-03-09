<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller{

    public function getMovieCrew(int $movie_id) : array{
        $api_key = env('API_KEY');
        $movieCredits = Http::get("https://api.themoviedb.org/3/movie/$movie_id/credits?api_key=$api_key");
        $directors = [];
        $writers = [];
        foreach($movieCredits['crew'] as $crewMember){
            if($crewMember['job'] === 'Director'){
                $directors[] = $crewMember['name'];
            }elseif($crewMember['job'] === 'Writer'){
                $writers[] = $crewMember['name'];
            }
        }
        return compact('directors','writers');
    }

    public function getMovie(int $movie_id){
        $api_key = env('API_KEY');
        return Http::get("https://api.themoviedb.org/3/movie/$movie_id?api_key=$api_key");
    }

    public function getPopularMovies(){
        $api_key = env('API_KEY');
        return Http::get("https://api.themoviedb.org/3/movie/popular?api_key=$api_key&language=en-US&page=1");
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class APIController extends Controller{

    public function getMovieCrew(int $movie_id) : array{
        $api_key = env('API_KEY');
        $movieCredits = Cache::remember(
            'movie.credits.' . $movie_id,
            now()->addDays(7),
            function () use ($movie_id,$api_key){
                $response = Http::get("https://api.themoviedb.org/3/movie/$movie_id/credits?api_key=$api_key");
                return $response->json();
            }
        );
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
        $movie = Cache::remember(
            'movie.' . $movie_id,
            now()->addDays(7),
            function () use ($movie_id, $api_key){
                $response = Http::get("https://api.themoviedb.org/3/movie/$movie_id?api_key=$api_key");
                return $response->json();
            }
        );
        return $movie;
    }

    public function getPopularMovies(){
        $api_key = env('API_KEY');
        $popularMovies = Cache::remember(
            'popular.movies',
            now()->addHours(6),
            function () use ($api_key){
                $response =  Http::get("https://api.themoviedb.org/3/movie/popular?api_key=$api_key&language=en-US&page=1");;
                return $response->json();
            }
        );
        return $popularMovies;
    }

    public function search(string $query){
        $api_key = env('API_KEY');
        $searchResult = Cache::remember(
            'search.result',
            now()->addDays(3),
            function () use ($api_key, $query){
                $response = Http::get("https://api.themoviedb.org/3/search/movie?api_key=$api_key&language=en-US&page=1&query=$query");
                return $response->json();
            }
        );
        return $searchResult;
    }
}

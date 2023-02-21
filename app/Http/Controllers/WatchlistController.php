<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\WatchlistedMovie;
use Illuminate\Http\Request;

class WatchlistController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function store($movie_id){
        $watchlistedMovie = WatchlistedMovie::where('movie_id',$movie_id);

        if($watchlistedMovie->exists()){
            $watchlistedMovie->delete();
            echo "+Watchlist";
        }else{
            auth()->user()->watchlist()->create([
                'movie_id' => $movie_id,
            ]);
            echo "-Watchlist";
        }
    }
}

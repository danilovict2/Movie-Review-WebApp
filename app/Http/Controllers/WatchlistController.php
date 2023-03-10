<?php

namespace App\Http\Controllers;


use App\Models\WatchlistedMovie;


class WatchlistController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function store(int $movie_id) : void{
        $watchlistedMovie = WatchlistedMovie::where('movie_id',$movie_id);

        if($watchlistedMovie->exists()){
            $watchlistedMovie->delete();
        }else{
            WatchlistedMovie::factory()->create([
                'movie_id' => $movie_id,
            ]);
        }
    }

    public function isWatchlisted(int $movie_id) : bool{
        $wathchlistedMovie = WatchlistedMovie::where('movie_id',$movie_id);
        return $wathchlistedMovie->exists();
    }
}

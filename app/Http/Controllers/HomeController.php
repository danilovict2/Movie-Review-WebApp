<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $recommendedMovies = [];
        $movie_ids = [2,3,5,6,8,9,11,12,13,114];
        for($i = 0; $i < 10; ++$i){
            $recommendedMovies[$i] = app('App\Http\Controllers\APIController')->getMovie($movie_ids[$i]);
        }
        $watchlistedMovies = [];
        if(isset(auth()->user()->watchlist)){
            foreach(auth()->user()->watchlist as $watchlistedMovie){
                $watchlistedMovies[] = app('App\Http\Controllers\APIController')->getMovie($watchlistedMovie['movie_id']);
            }
        }
        return view('home',compact('recommendedMovies','watchlistedMovies'));
    }
}

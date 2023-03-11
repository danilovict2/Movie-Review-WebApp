<?php

namespace App\Http\Controllers;



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
        $recommendedMovies = app('App\Http\Controllers\APIController')->getPopularMovies()['results'];
        $watchlistedMovies = [];
        if(isset(auth()->user()->watchlist)){
            foreach(auth()->user()->watchlist as $watchlistedMovie){
                $watchlistedMovies[] = app('App\Http\Controllers\APIController')->getMovie($watchlistedMovie['movie_id']);
            }
        }
        return view('home',compact('recommendedMovies','watchlistedMovies'));
    }
}

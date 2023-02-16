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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $movies = [];
        $movieImages = [];
        $movie_ids = [2,3,5,6,8,9,11,12,13,114];
        for($i = 0; $i < 10; ++$i){
            $movies[$i] = app('App\Http\Controllers\APIController')->getMovie($movie_ids[$i]);
            $movieImages[$i] = app('App\Http\Controllers\APIController')->getMovieImage($movie_ids[$i]);
        }
        return view('home',compact('movies','movieImages'));
    }
}

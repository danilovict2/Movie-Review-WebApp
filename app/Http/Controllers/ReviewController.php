<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function store(int $movie_id){

    }

    public function index(int $movie_id){
        return view('movies.review');
    }

}

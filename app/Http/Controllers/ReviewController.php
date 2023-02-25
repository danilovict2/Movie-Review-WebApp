<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function store(int $movie_id){
        $data = request()->validate([
            'star1' => 'required',
        ]);
        dd($data);
    }

    public function index(int $movie_id){
        return view('movies.review', compact('movie_id'));
    }

}

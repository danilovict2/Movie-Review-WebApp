<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(int $movie_id){
        return view('movies.review', compact('movie_id'));
    }

    public function store(int $movie_id){
        $data = request()->validate([
            'star1' => 'nullable',
            'star2' => 'nullable',
            'star3' => 'nullable',
            'star4' => 'nullable',
            'star5' => 'nullable',
            'star6' => 'nullable',
            'star7' => 'nullable',
            'star8' => 'nullable',
            'star9' => 'nullable',
            'star10' => 'nullable'
        ]);
        if(!$data){
            return redirect("/review/$movie_id/rate");
        }
        $key = array_keys($data)[0];
        auth()->user()->reviewed()->create([
            'movie_id' => $movie_id,
            'review' => (int)$data[$key]
        ]);
        return redirect('home');
    }

}

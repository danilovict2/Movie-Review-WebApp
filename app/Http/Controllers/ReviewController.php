<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(int $movie_id){
        return view('movies.review', compact('movie_id'));
    }

    public function store(int $movie_id){
        $data = request()->except('_token');
        $validator = Validator::make($data, ['star' => 'required|in:1,2,3,4,5,6,7,8,9,10']);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        auth()->user()->reviewed()->create([
            'movie_id' => $movie_id,
            'review' => (int)$data['star']
        ]);
        return redirect('home');
    }

    public function isReviewed(int $movie_id) : bool{
        return auth()->user()->reviewed->contains($movie_id);
    }

    public function averageReview(int $movie_id) : float{
        return DB::table('reviewed_movies')->where("movie_id","=",$movie_id)->avg('review') ?? 0.0;
    }
}

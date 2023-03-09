<?php

namespace App\Http\Controllers;

use App\Models\ReviewedMovie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(int $movie_id){
        $isReviewed = $this->isReviewed($movie_id);
        return view('movies.review', compact('movie_id','isReviewed'));
    }

    public function isReviewed(int $movie_id){
        $user_id = auth()->user()->id;
        $isReviewedQuery = ReviewedMovie::where('user_id','=', $user_id)->where('movie_id','=',$movie_id)->exists();
        return $isReviewedQuery ? ReviewedMovie::where('user_id','=', $user_id)->where('movie_id','=',$movie_id)->get() : false;
    }

    public function store(int $movie_id){
        $data = request()->except('_token');
        $validator = Validator::make($data, ['star' => 'required|in:1,2,3,4,5,6,7,8,9,10']);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        ReviewedMovie::factory()->create([
            'movie_id' => $movie_id,
            'review' => (int)$data['star']
        ]);
        return redirect('home');
    }

    public function update(int $movie_id){
        $data = request()->except('_token');
        $validator = Validator::make($data, ['star' => 'required|in:1,2,3,4,5,6,7,8,9,10']);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        $user_id = auth()->user()->id;
        ReviewedMovie::where('movie_id','=',$movie_id)
        ->where('user_id','=',$user_id)
        ->update(['review' => (int)$data['star']]);
        return redirect('home');
    }

    public function delete(int $movie_id){
        $user_id = auth()->user()->id;
        ReviewedMovie::where('movie_id','=',$movie_id)
        ->where('user_id','=',$user_id)
        ->delete();
        return redirect('home');
    }


}

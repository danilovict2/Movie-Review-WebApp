<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class WatchlistController extends Controller{

    public function store(Movie $movie){
        auth()->user()->watchlist()->toggle($movie);
    }
}

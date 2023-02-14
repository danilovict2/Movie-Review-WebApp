<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class FrontendController extends Controller{
    public function show(){
        return view('movies.show');
    }
}

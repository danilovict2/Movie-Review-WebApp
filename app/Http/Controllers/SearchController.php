<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SearchController extends Controller{

    public function search(){
        $data = request()->validate([
            'searchText' => 'required'
        ]);
        $searchResult = Cache::remember(
            'search.result',
            now()->addDays(7),
            function () use ($data){
                return app('App\Http\Controllers\APIController')->search($data['searchText'])['results'];
            }
        );
        return view('searchResult', compact('searchResult'));
    }
}

@extends('layouts.app')

@section('content')
    <div class="container" style="color: white;">
        <div class="px-10">
            <h1 class="text-warning pb-2">What to watch</h1>
            <div class="WhatToWatch">

                <h3 style="border-left: 3px solid yellow; border-radius: 3px; padding-left: 7px; margin-bottom: 30px;">
                    <strong>Top picks</strong>
                </h3>
                <div class="row">
                    @foreach ($movies as $movie)
                    <div class="col-2">
                        <img class="w-100" src="https://image.tmdb.org/t/p/w500{{  $movie['poster_path']  }}">
                        <div class="stars">stars</div>
                        <div class="title lead">{{  $movie['title']  }}</div>
                        <div class="watchlist d-flex justify-content-center py-4">
                            <button class="text-primary w-75" style="background-color: black; border:0ch;">+Watchlist</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            <div class="FromYourWatchlist">
                <h3 style="border-left: 3px solid yellow; border-radius: 3px; padding-left: 7px; margin-bottom: 30px; margin-top: 30px;">
                    <strong>From Your Watchlist</strong>
                </h3>
                <div class="row">
                    <div class="col-2">
                        <a href="/movie"><img class="w-100" src="https://upload.wikimedia.org/wikipedia/hr/8/8a/Dark_Knight.jpg"></a>
                        <div class="stars">stars</div>
                        <div class="title">The Dark Knight</div>
                        <div class="watchlist text-primary">+Watchlist</div>
                    </div>
                    <div class="col-2">
                        <img class="w-100" src="https://upload.wikimedia.org/wikipedia/hr/8/8a/Dark_Knight.jpg">
                        <div class="stars">stars</div>
                        <div class="title">The Dark Knight</div>
                        <div class="watchlist text-primary">+Watchlist</div>
                    </div>
                    <div class="col-2">
                        <img class="w-100" src="https://upload.wikimedia.org/wikipedia/hr/8/8a/Dark_Knight.jpg">
                        <div class="stars">stars</div>
                        <div class="title">The Dark Knight</div>
                        <div class="watchlist text-primary">+Watchlist</div>
                    </div>
                    <div class="col-2">
                        <img class="w-100" src="https://upload.wikimedia.org/wikipedia/hr/8/8a/Dark_Knight.jpg">
                        <div class="stars">stars</div>
                        <div class="title">The Dark Knight</div>
                        <div class="watchlist text-primary">+Watchlist</div>
                    </div>
                    <div class="col-2">
                        <img class="w-100" src="https://upload.wikimedia.org/wikipedia/hr/8/8a/Dark_Knight.jpg">
                        <div class="stars">stars</div>
                        <div class="title">The Dark Knight</div>
                        <div class="watchlist text-primary">+Watchlist</div>
                    </div>
                    <div class="col-2">
                        <img class="w-100" src="https://upload.wikimedia.org/wikipedia/hr/8/8a/Dark_Knight.jpg">
                        <div class="stars">stars</div>
                        <div class="title">The Dark Knight</div>
                        <div class="watchlist text-primary">+Watchlist</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

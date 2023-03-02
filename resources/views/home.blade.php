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
                    @foreach ($recommendedMovies as $movie)
                        <div class="col-2">
                            <a href="/movie/{{ $movie['id'] }}"><img class="w-100"
                                    src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"></a>
                            <rating-stars movie_id = {{$movie['id']}}></rating-stars>
                            <a href="/movie/{{ $movie['id'] }}" style="color: white; text-decoration: none; white-space: nowrap;">
                                <div class="title lead px-2">{{ $movie['title'] }}</div>
                            </a>
                            <div class="watchlist d-flex justify-content-center py-4">
                                <watchlist-button movie_id="{{ $movie['id'] }}">+Watchlist</watchlist-button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="FromYourWatchlist">
                    <h3
                        style="border-left: 3px solid yellow; border-radius: 3px; padding-left: 7px; margin-bottom: 30px; margin-top: 30px;">
                        <strong>From Your Watchlist</strong>
                    </h3>
                    <div class="row">
                        @foreach ($watchlistedMovies as $movie)
                            <div class="col-2">
                                <a href="/movie/{{ $movie['id'] }}"><img class="w-100"
                                        src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"></a>
                                <div class="stars">
                                    <span class="imdb">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29"
                                            class="ipc-icon ipc-icon--star sc-e457ee34-4 dzsYfH" id="iconContext-star"
                                            viewBox="0 0 24 24" fill="currentColor" role="presentation">
                                            <path
                                                d="M12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72 3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z">
                                            </path>
                                        </svg>
                                        <span class="rating pr-0">7.9/10</span>
                                    </span>
                                    <span class="rate">
                                        <review-button></review-button>
                                    </span>
                                </div>
                                <a href="/movie/{{ $movie['id'] }}" style="color: white; text-decoration: none;">
                                    <div class="title lead">{{ $movie['title'] }}</div>
                                </a>
                                <div class="watchlist d-flex justify-content-center py-4">
                                    <watchlist-button movie_id="{{ $movie['id'] }}">+Watchlist</watchlist-button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection

@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center" style="color: white;">
        @if ($searchResult)
            @foreach ($searchResult as $result)
                <div class="row pt-3">
                    <div class="col-6">
                        <a href="/movie/{{ $result['id'] }}">
                            <img class="w-100" src="https://image.tmdb.org/t/p/w500{{ $result['poster_path'] }}">
                        </a>
                        <rating-stars-small movie_id={{ $result['id'] }}></rating-stars-small>
                        <a href="/movie/{{ $result['id'] }}"
                            style="color: white; text-decoration: none; white-space: nowrap;">
                            <div class="title lead px-2">{{ $result['title'] }}</div>
                        </a>
                        <div class="watchlist d-flex justify-content-center py-4">
                            <watchlist-button movie_id="{{ $result['id'] }}">+Watchlist</watchlist-button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else <h1>NO RESULTS</h1>
        @endif
    </div>
@endsection

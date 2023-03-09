@extends('layouts.app')

@section('content')
    <div class="container" style="color: white;">
        <h1 class="title">{{ $movie['title'] }}</h1>
        <span class="info">
            <rating-stars-big movie_id={{ $movie['id'] }}></rating-stars-big>
        </span>
        <div class="Extra Details">
            <span class="year" style="padding-right: 5px;">{{ substr($movie['release_date'], 0, 4) }}</span>
            <span class="length">{{ round($movie['runtime'] / 60) }}h
                {{ $movie['runtime'] - 60 * round($movie['runtime'] / 60, 0) }}m</span>
        </div>
        <div class="details">
            <img class="pt-3" src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" style="max-width: 20em;">
            <img src="https://image.tmdb.org/t/p/w500{{ $movie['backdrop_path'] }}"
                style="padding-top: 15px; width: 55em; padding-left: 2px; height: 31em; display: inline;">
            <div class="genres d-flex pt-2">
                @foreach ($movie['genres'] as $genre)
                    <span class="genre p-2">{{ $genre['name'] }}</span>
                @endforeach
            </div>
            <div class="desc mt-1 mb-1" style="margin-top: 1em; margin-bottom: 1em;">
                {{ $movie['overview'] }}
            </div>
            <div class="d-flex flex-column extras">
                <span class="director w-50"
                    style="border-top: 1px solid grey; border-bottom: 1px solid grey; padding: 10px 0; margin-top: 10px;">
                    Directors:
                    @foreach ($directorsAndWriters['directors'] as $director)
                        {{ $director }}
                    @endforeach
                </span>
                <span class="review" style="margin-left: auto;font-size: 30px; pb-1">
                    <watchlist-button movie_id="{{ $movie['id'] }}">+Watchlist</watchlist-button>
                </span>
                <span class="writer w-50"
                    style="border-top: 1px solid grey; border-bottom: 1px solid grey; padding: 10px 0; margin-top: -40px;">
                    Writers:
                    @foreach ($directorsAndWriters['writers'] as $writer)
                        {{ $writer }}
                    @endforeach
                </span>
            </div>

        </div>
    </div>
@endsection

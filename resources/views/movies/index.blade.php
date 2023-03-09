@extends('layouts.app')

@section('content')
    <div class="container" style="color: white;">
        <h1 class="title">{{ $movie['title'] }}</h1>
        <span class="info">
            <rating-stars-big movie_id = {{  $movie['id']  }}></rating-stars-big>
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
                    <span href="/" class="genre p-2">{{ $genre['name'] }}</span>
                @endforeach
            </div>
            <div class="desc" style="margin-top: 1em; margin-bottom: 1em;">
                {{ $movie['overview'] }}
            </div>
            <div class="crew">
                <span class="director">
                    Director
                    @foreach ($directorsAndWriters['directors'] as $director)
                        {{ $director }}
                    @endforeach
                </span>
                <span class="writer">
                    Writer
                    @foreach ($directorsAndWriters['writers'] as $writer)
                        {{ $writer }}
                    @endforeach
                </span>
            </div>
        </div>
    </div>
@endsection

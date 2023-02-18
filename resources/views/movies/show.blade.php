@extends('layouts.app')

@section('content')
    <div class="container" style="color: white;">
        <h1 class="title">{{  $movie['title']  }}</h1>
        <span class="info">
            <span class="IMDb rating">
                IMDb rating <br>
                stars
            </span>
            <span class="Your rating">
                Your rating <br>
                stars
            </span>
        </span>
        <div class="Extra Details">
            <span class="year" style="padding-right: 5px;">{{ substr($movie['release_date'],0,4) }}</span>
            <span class="length">{{  round($movie['runtime']/60)  }}h {{$movie['runtime']-60}}m</span>
        </div>
        <div class="details">
            <img class="pt-3" src="https://image.tmdb.org/t/p/w500{{  $movie['poster_path']  }}" style="max-width: 20em;">
            <img src="https://image.tmdb.org/t/p/w500{{  $movie['backdrop_path']  }}" style="  padding-top: 15px; width: 60em; padding-left: 2px; height: 31em;">
            <div class="directorAndWriter">
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

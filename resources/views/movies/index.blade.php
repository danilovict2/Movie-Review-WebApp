@extends('layouts.app')

@section('content')
    <div class="container" style="color: white;">
        <h1 class="title">{{ $movie['title'] }}</h1>
        <span class="info">
            <span class="IMDb rating" style="font-size: 20px;">
                IMDb rating
                <button class="d-flex border-0 bg-black w-100 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29"
                        class="ipc-icon ipc-icon--star sc-e457ee34-4 dzsYfH" id="iconContext-star" viewBox="0 0 24 24"
                        fill="currentColor" role="presentation">
                        <path
                            d="M12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72 3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z">
                        </path>
                    </svg>
                    <span class="rating pr-0">7.9/10</span>
                </button>
            </span>
            <span class="Your rating" style="font-size: 20px;">
                Your Rating
                <review-button></review-button>
            </span>
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

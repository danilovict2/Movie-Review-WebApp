@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="color: white;">
        <form action="/review/{{$movie_id}}" method="POST">
            @csrf

            <div class="rating d-flex flex-row-reverse mb-2 pt-2">
                @for ($i = 1; $i <= 10; ++$i)
                    <input type="radio" class="" name="star{{$i}}" value="{{$i}}">
                @endfor
            </div>
            <div class="submit d-flex justify-content-center pt-5">
                <button type="submit" class="btn btn-primary btn-lg">
                    Rate
                </button>
            </div>

        </form>
    </div>
@endsection

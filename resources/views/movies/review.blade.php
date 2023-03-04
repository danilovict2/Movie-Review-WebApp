@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="color: white;">
        <form action="/review/{{ $movie_id }}" method="POST">
            @csrf

            <div class="rating d-flex flex-row-reverse mb-2 pt-2">
                @for ($i = 10; $i >= 1; $i--)
                    <input type="radio" name="star" value="{{ $i }}">
                @endfor
            </div>
            <div class="errors d-flex justify-content-center text-danger">
                @if ($errors->any())
                    <h3>At least one star is required</h3>
                @endif
            </div>

            <div class="submit d-flex justify-content-center pt-5">
                <button type="submit" class="btn btn-primary btn-lg">
                    Rate
                </button>
            </div>
            @if ($isReviewed)
                @method('PATCH')
                <div class="my-4 d-flex justify-content-center">
                    <form action="/review/{{ $movie_id }}" method="POST">
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary btn-lg">
                            Remove your rating
                        </button>
                    </form>
                </div>

            @endif
        </form>
    </div>
@endsection

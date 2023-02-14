@extends('layouts.app')

@section('content')
    <div class="container" style="color: white;">
        <h1 class="title">Title</h1>
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
            <span class="year" style="padding-right: 5px;">year</span>
            <span class="length">length</span>
        </div>
        <div class="details">
            <img class="w-30 pt-3" src="https://upload.wikimedia.org/wikipedia/hr/8/8a/Dark_Knight.jpg">
            <div class="directorAndWriter">
                <span class="director">Director</span>
                <span class="writer">Writer</span>
            </div>
        </div>
    </div>
@endsection

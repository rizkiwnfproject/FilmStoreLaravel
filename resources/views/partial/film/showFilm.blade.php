@extends('layout.home')
@section('judul')
    Show Film
@endsection
@section('content')
    <div class="d-flex flex-row-reverse align-items-center">
        <img src="{{ asset('uploads/' . $film->poster) }}" alt="Poster" class="img-thumbnail w-50" style="height: 300px; object-fit: cover; object-position: top">
        <div class="card-body">
            <h1>{{ $film->title }}</h1>
            <div class="d-flex">
                <button type="button" class="btn btn-warning mb-3 mr-4">
                    {{ $film->genre->name }}
                </button>
            </div>
            <h5 class="card-title">{{ $film->summary }}</h5>
            <p class="card-text">{{ $film->release }}</p>

            <h4>Cast:</h4>
            <ol>
                @forelse ($film->filmcasts as $cast)
                    <li>{{ $cast->cast->name }} as {{ $cast->role }}</li>
                @empty
                    <p>Cast Kosong</p>
                @endforelse
            </ol>

            @auth
                @if (Auth::user()->role == 0)
                    <button type="button" class="btn btn-primary mb-3 mr-4">
                        <a href="{{ route('review.create') }}" class="text-white">Add New Review</a>
                    </button>
                    <button type="button" class="btn btn-primary mb-3 mr-4">
                        <a href="{{ route('review.indexById', $film->id) }}" class="text-white">See This Reviews</a>
                    </button>
                @endif
            @endauth
        </div>
    </div>
    <a href="{{ route('film.index') }}" class="btn btn-secondary mt-3 ml-4">Back to List</a>
@endsection

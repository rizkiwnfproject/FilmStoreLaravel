@extends('layout.home')
@section('judul')
    Show Film
@endsection
@section('content')
    <div class="d-flex flex-row-reverse align-items-center">
        <img src="{{ asset('uploads/' . $film->first()->film->poster) }}" alt="Poster" class="img-thumbnail w-50"
            style="height: 300px; object-fit: cover; object-position: top">
        <div class="card-body d-flex flex-column">
            <h1>{{ $film->first()->film->title }}</h1>
            <div class="d-flex">
                <button type="button" class="btn btn-warning mb-3 mr-2">
                    {{ $film->first()->film->reviews->avg('point') ? number_format($film->first()->film->reviews->avg('point'), 2) : 'No Reviews' }}
                    / 100.00
                </button>
                <button type="button" class="btn btn-info mb-3 mr-4">{{ $film->first()->film->release_year }}</button>
            </div>
            <h5 class="card-title">{{ $film->first()->film->summary }}</h5>
            <div class="mt-3">
                <h4>Actors of Film </h4>
                <ol>
                    @foreach ($film as $filmCast)
                        <li>{{ $filmCast->cast->name }} as {{ $filmCast->role }}</li>
                    @endforeach
                </ol>
            </div>
            @if (Auth::user()->role == 0)
                <div class="d-flex">
                    <button type="button" class="btn btn-primary mb-3 mr-4">
                        <a href="{{ route('review.create') }}" class="text-white">Add New Review</a>
                    </button>
                    <button type="button" class="btn btn-primary mb-3 mr-4">
                        <a href="{{ route('review.indexById', $film->first()->film->id) }}" class="text-white">See This
                            Reviews</a>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <a href="{{ route('film_cast.index') }}" class="btn btn-secondary mt-3 ml-4">Back to List</a>
    </div>
@endsection

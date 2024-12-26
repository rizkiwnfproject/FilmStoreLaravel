@extends('layout.home')
@section('judul')
    Show Review
@endsection
@section('content')
    <div class="d-flex flex-row-reverse align-items-center">
        <img src="{{ asset('storage/' . $review->film->poster) }}" alt="Poster" class="img-thumbnail w-50" style="height: 300px; object-fit: cover; object-position: top">
        <div class="card-body">
            <h1>{{ $review->film->title }} ({{ $review->point }} / 100)</h1>
            {{-- <h5>By : {{ $review->user->name }}</h5> --}}
            <p>{{ $review->content }}</p>
        </div>
    </div>
    <a href="{{ route('review.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection

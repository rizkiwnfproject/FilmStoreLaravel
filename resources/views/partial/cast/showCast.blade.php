@extends('layout.home')
@section('judul')
    Show Cast
@endsection
@section('content')
    <div class="d-flex flex-row-reverse align-items-center">
        <img class="card-img-top" src="{{ asset('/assets/images/angelina.jpg') }}" alt="angelina" style="width: 600px;">
        <div class="card-body">
            <h1>{{ $cast->name }} ({{ $cast->age }} years)</h1>
            <p class="card-text">{{ $cast->bio }}</p>
            <h4>Title of Movies:</h4>
            <ol>
                @forelse ($cast->filmcasts as $cast)
                    <li>{{ $cast->film->title }} as {{ $cast->role }}</li>
                @empty
                    <p>Yet to Star in a Movie</p>
                @endforelse
            </ol>
        </div>
    </div>
    <a href="{{ route('cast.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection

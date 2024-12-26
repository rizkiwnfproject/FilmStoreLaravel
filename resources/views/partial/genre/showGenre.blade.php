@extends('layout.home')
@section('judul')
    Show Genre
@endsection
@section('content')
    <div class="d-flex flex-row-reverse align-items-center">
        {{-- <img class="card-img-top" src="{{ asset('/assets/images/angelina.jpg') }}" alt="angelina" style="width: 600px;"> --}}
        <div class="card-body">
            <h1>{{ $genre->name }}</h1>
        </div>
    </div>

    @if ($genre->films->isNotEmpty())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th style="width: 200px">Release Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genre->films as $index => $film)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $film->title }}</td>
                        <td>{{ $film->summary }}</td>
                        <td>{{ $film->release_year }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="pl-4">No films available for this genre.</p>
    @endif

    <a href="{{ route('genre.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection

@extends('layout.home')
@section('judul')
    Edit Genre
@endsection
@section('content')
    <div class="container">
        <h1>Edit Genre</h1>
        <form action="{{ route('genre.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $genre->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

@extends('layout.home')
@section('judul')
    Edit Film
@endsection
@section('content')
    <div class="container">
        <h1>Edit Film</h1>
        <form action="{{ route('film.update', $film->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $film->title }}" required>
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <input type="text" name="summary" id="summary" class="form-control" value="{{ $film->summary }}" required>
            </div>
            <div class="mb-3">
                <label for="release_year" class="form-label">Release Year</label>
                <input type="number" name="release_year" id="release_year" class="form-control" value="{{ $film->release_year }}" required>
            </div>
            <div class="mb-3">
                <label for="poster" class="form-label">Poster</label>
                <input type="file" name="poster" id="poster" class="form-control">
            </div>
            <div class="mb-3">
                <label for="genre_id" class="form-label">Genre</label>
                <select name="genre_id" id="genre_id" class="form-control" required>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $genre->id == $film->genre_id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

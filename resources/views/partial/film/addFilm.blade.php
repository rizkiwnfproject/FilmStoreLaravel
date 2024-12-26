@extends('layout.home')
@section('judul')
    Add New Film
@endsection
@section('content')
    <h1>Add New Film</h1>
    <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <input type="text" name="summary" id="summary" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="release_year" class="form-label">Release</label>
            <input type="text" name="release_year" id="release_year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="poster" class="form-label">Poster</label>
            <input type="file" name="poster" id="poster" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Genre</label>
            <select name="genre_id" id="genre_id" class="form-control" required>
                <option value="">Pilih Genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

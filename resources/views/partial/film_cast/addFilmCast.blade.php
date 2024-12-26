@extends('layout.home')
@section('judul')
    Add New Cast in Film
@endsection
@section('content')
    <h1>Add New Cast in Film</h1>
    <form action="{{ route('film_cast.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="film_id" class="form-label">Film</label>
            <select name="film_id" id="film_id" class="form-control" required>
                <option value="">Pilih Film</option>
                @foreach ($films as $film)
                    <option value="{{ $film->id }}">{{ $film->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cast_id" class="form-label">Cast</label>
            <select name="cast_id" id="cast_id" class="form-control" required>
                <option value="">Pilih Cast</option>
                @foreach ($casts as $cast)
                    <option value="{{ $cast->id }}">{{ $cast->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" name="role" id="role" class="form-control" required
                placeholder="Contoh: Pemeran Utama">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

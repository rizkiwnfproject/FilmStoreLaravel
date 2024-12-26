@extends('layout.home')
@section('judul')
    Edit Cast in Film
@endsection
@section('content')
    <div class="container">
        <h1>Edit Cast in Film</h1>
        <form action="{{ route('film_cast.update', $filmCast->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="film_id" class="form-label">Film</label>
                <select name="film_id" id="film_id" class="form-control" required>
                    @foreach ($films as $film)
                        <option value="{{ $film->id }}" {{ $film->id == $filmCast->film_id ? 'selected' : '' }}>
                            {{ $film->judul }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="cast_id" class="form-label">Cast</label>
                <select name="cast_id" id="cast_id" class="form-control" required>
                    @foreach ($casts as $cast)
                        <option value="{{ $cast->id }}" {{ $cast->id == $filmCast->cast_id ? 'selected' : '' }}>
                            {{ $cast->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ $filmCast->role }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

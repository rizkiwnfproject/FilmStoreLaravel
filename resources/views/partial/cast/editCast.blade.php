@extends('layout.home')
@section('judul')
    Edit Cast
@endsection
@section('content')
    <div class="container">
        <h1>Edit Cast</h1>
        <form action="{{ route('cast.update', $cast->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $cast->name }}" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" id="age" class="form-control" value="{{ $cast->age }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea name="bio" id="bio" class="form-control" rows="3" required>{{ $cast->bio }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

@extends('layout.home')
@section('judul')
    Add New Cast
@endsection
@section('content')
        <h1>Add New Cast</h1>
        <form action="{{ route('cast.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" id="age" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea name="bio" id="bio" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
@endsection

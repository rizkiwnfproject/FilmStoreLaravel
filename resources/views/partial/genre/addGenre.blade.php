@extends('layout.home')
@section('judul')
    Add New Cast
@endsection
@section('content')
        <h1>Add New Genre</h1>
        <form action="{{ route('genre.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
@endsection

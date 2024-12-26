@extends('layout.home')
@section('judul')
    Edit Genre
@endsection
@section('content')
    <div class="container">
        <h1>Edit Genre</h1>
        <form action="{{ route('profile.update')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" id="age" class="form-control" value="{{ $profile->age ?? 0 }}" required>
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <input type="text" name="bio" id="bio" class="form-control" value="{{ $profile->bio ?? ''}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

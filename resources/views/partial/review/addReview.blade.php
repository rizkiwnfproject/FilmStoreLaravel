@extends('layout.home')
@section('judul')
    Add New Review
@endsection
@section('content')
    <h1>Add New Review</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    <form action="{{ route('review.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="film_id" class="form-label">Film</label>
            <select name="film_id" id="film_id" class="form-control" required>
                <option value="">Pilih Judul Film</option>
                @foreach ($films as $film)
                    <option value="{{ $film->id }}">{{ $film->title }}</option>
                    <!-- Ganti 'name' ke 'title' jika kolomnya 'title' -->
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <input type="text" name="content" id="content" class="form-control" required>
        </div>
        <label for="point" class="form-label">Point</label>
        <div class="input-group d-flex align-items-center mb-3">
            <input type="number" aria-label="First name" class="form-control rounded-left" name="point" max="100"
                min="1" required>
            <span class="text-center py-2 bg-primary rounded-right" style="width: 100px">/100</span>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

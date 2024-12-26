@extends('layout.home')
@section('judul')
    Edit Review
@endsection
@section('content')
    <div class="container">
        <h1>Edit Review</h1>
        <form action="{{ route('review.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="film_id" class="form-label">Film</label>
                <select name="film_id" id="film_id" class="form-control" required>
                    <option value="">Pilih Judul Film</option>
                    @foreach ($films as $film)
                        <option value="{{ $film->id }}" {{$film->id == $review->film_id ? 'selected' : ''}} >{{ $film->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input type="text" name="content" id="content" class="form-control" value="{{$review->content}}" required>
            </div>
            <label for="point" class="form-label">Point</label>
            <div class="input-group d-flex align-items-center mb-3">
                <input type="number" aria-label="First name" class="form-control rounded-left" name="point" max="100"
                    min="1" value="{{$review->point}}" required>
                <span class="text-center py-2 bg-primary rounded-right" style="width: 100px">/100</span>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection

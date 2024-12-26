@extends('layout.home')
@section('judul')
    List Review
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>List of Review</h1>
        @auth
            @if (Auth::user()->role == 0)
                <a href="{{ route('review.create') }}" class="btn btn-primary ">Add New Review</a>
            @endif
        @endauth
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                @auth
                    @if (Auth::user()->role == 1)
                        <th>User</th>
                    @endif
                @endauth
                <th>Film</th>
                <th>Content</th>
                <th>Point</th>
                <th style="width: 400px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
            @forelse ($reviews as $review)
                <tr>
                    <td>{{ $number++ }}</td>
                    @auth
                        @if (Auth::user()->role == 1)
                            <td>{{ $review->user->name }}</td> <!-- Menampilkan nama user -->
                        @endif
                    @endauth
                    <td>{{ $review->film->title }}</td> <!-- Menampilkan nama film -->
                    <td>{{ $review->content }}</td>
                    <td>{{ $review->point }}</td>
                    <td>
                        <a href="{{ route('review.show', $review->id) }}" class="btn btn-info">View</a>
                        @auth
                            @if (Auth::user()->id == $review->user_id)
                                <a href="{{ route('review.edit', $review->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('review.destroy', $review->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                        @endauth
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak Ada Data Review</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@extends('layout.home')
@section('judul')
    List Genre
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>List of Genre</h1>
        @auth
            @if (Auth::user()->role == 1)
                <a href="{{ route('genre.create') }}" class="btn btn-primary">Add New Genre</a>
            @endif
        @endauth
    </div>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th style="width: 10px">No</th>
                <th>Name</th>
                <th style="width: 200px">Number of Films</th>
                <th style="width: 400px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
            @forelse ($genres as $genre)
                <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $genre->name }}</td>
                    <td class="text-center">{{ $genre->films_count }}</td> <!-- Menggunakan films_count dari withCount -->
                    @auth
                        @if (Auth::user()->role == 1)
                            <td>
                                <a href="{{ route('genre.show', $genre->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('genre.edit', $genre->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('genre.destroy', $genre->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        @else
                            <td>
                                <a href="{{ route('genre.show', $genre->id) }}" class="btn btn-info">View</a>
                            </td>
                        @endif
                    @else
                        <td>
                            <a href="{{ route('genre.show', $genre->id) }}" class="btn btn-info">View</a>
                        </td>
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak Ada Data Genre</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

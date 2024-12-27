@extends('layout.home')
@section('judul')
    List Film
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>List of Films</h1>
        @auth
            @if (Auth::user()->role == 1)
                <a href="{{ route('film_cast.create') }}" class="btn btn-primary ">Add New Film</a>
            @endif
        @endauth
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Title</th>
                <th>Release</th>
                <th>Cast</th>
                <th style="width: 140px">Reviews</th>
                <th style="width: 250px">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $films = $filmCasts->groupBy('film_id');
                $number = 1;
            @endphp
            @forelse ($films as $filmId => $groupedFilmCasts)
                @php
                    $film = $groupedFilmCasts->first(); // Ambil satu data dari grup untuk menampilkan info film
                @endphp
                <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $film->film->title }}</td>
                    <td>{{ $film->film->release_year }}</td>
                    <td>
                        <ol>
                            @foreach ($groupedFilmCasts as $filmCast)
                                <li>{{ $filmCast->cast->name }} as {{ $filmCast->role }}</li>
                            @endforeach
                        </ol>
                    </td>
                    <td>
                        {{ $film->film->reviews->avg('point') ? number_format($film->film->reviews->avg('point'), 2) : 'No Reviews' }}
                        / 100.00
                    </td>
                    @auth
                        @if (Auth::user()->role == 1)
                            <td>
                                <a href="{{ route('film_cast.show', $film->film->id) }}" class="btn btn-info">View</a>
                                {{-- <a href="{{ route('film_cast.edit', $film->id) }}" class="btn btn-warning">Edit</a> --}}
                                <form action="{{ route('film_cast.destroy', $film->film->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        @else
                            <td>
                                <a href="{{ route('film_cast.show', $film->film->id) }}" class="btn btn-info">View</a>
                            </td>
                        @endif
                    @else
                        <td>
                            <a href="{{ route('film_cast.show', $film->film->id) }}" class="btn btn-info">View</a>
                        </td>
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak Ada Data Film</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

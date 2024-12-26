@extends('layout.home')
@section('judul')
    List Film
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>List of Films</h1>
        {{-- @auth
            <p>Anda sudah login sebagai {{ Auth::user()->name }}</p>
        @endauth

        @guest
            <p>Anda belum login. Silakan login terlebih dahulu.</p>
        @endguest --}}
        @auth
            @if (Auth::user()->role == 1)
                <a href="{{ route('film.create') }}" class="btn btn-primary ">Add New Film</a>
            @endif
        @endauth
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Title</th>
                <th>Summary</th>
                <th>Release</th>
                <th>Genre</th>
                <th style="width: 140px">Point Reviews</th>
                <th style="width: 250px">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
            @forelse ($films as $film)
                <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->summary }}</td>
                    <td>{{ $film->release_year }}</td>
                    <td>{{ $film->genre->name }}</td>
                    <td>
                        {{ $film->reviews->avg('point') ? number_format($film->reviews->avg('point'), 2) : 'No Reviews' }} /
                        100.00
                    </td>
                    @auth
                        @if (Auth::user()->role == 1)
                            <td>
                                <a href="{{ route('film.show', $film->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('film.edit', $film->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('film.destroy', $film->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        @else
                            <td>
                                <a href="{{ route('film.show', $film->id) }}" class="btn btn-info">View</a>
                            </td>
                        @endif
                    @else
                        <td>
                            <a href="{{ route('film.show', $film->id) }}" class="btn btn-info">View</a>
                        </td>
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak Ada Data Film</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

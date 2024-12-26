@extends('layout.home')
@section('judul')
    List Cast
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>List of Casts</h1>
        @auth
            @if (Auth::user()->role == 1)
                <a href="{{ route('cast.create') }}" class="btn btn-primary ">Add New Cast</a>
            @endif
        @endauth
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Name</th>
                <th>Age</th>
                <th>Bio</th>
                <th class="w-25">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
            @forelse ($casts as $cast)
                <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $cast->name }}</td>
                    <td>{{ $cast->age }}</td>
                    <td>{{ $cast->bio }}</td>
                    @auth
                        @if (Auth::user()->role == 1)
                            <td>
                                <a href="{{ route('cast.show', $cast->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('cast.edit', $cast->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('cast.destroy', $cast->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        @else
                            <td>
                                <a href="{{ route('cast.show', $cast->id) }}" class="btn btn-info">View</a>
                            </td>
                        @endif
                    @else
                        <td>
                            <a href="{{ route('cast.show', $cast->id) }}" class="btn btn-info">View</a>
                        </td>
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak Ada Data Cast</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@extends('layout.home')
@section('judul')
    User Profile
@endsection
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2>User Profile</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        {{-- <img src="{{ asset('/assets/images/default-avatar.png') }}" alt="User Avatar" class="rounded-circle"
                            style="width: 150px; height: 150px; object-fit: cover;"> --}}
                    </div>
                    <div class="col-md-8">
                        <h4>Personal Information</h4>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td>{{ $user->profile->age ?? 'Not Provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Bio</th>
                                    <td>{{ $user->profile->bio ?? 'Not Provided' }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('profile.edit') }}" class="btn btn-warning mt-3">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

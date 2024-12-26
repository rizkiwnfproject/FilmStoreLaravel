<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moviews</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <header class="mb-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('dashboard') }}">Moviews</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <div class="navbar-nav mr-auto"></div>
                    <span class="navbar-text">
                        @if (Auth::check())
                            <!-- Jika sudah login -->
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger text-white">Logout</button>
                            </form>
                        @else
                            <!-- Jika belum login -->
                            <a href="{{ route('login') }}" class="btn btn-info text-white">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-primary text-white">Register</a>
                        @endif
                    </span>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container mx-auto" style="width: 70%;">
            <div class="d-flex flex-wrap ">
                @forelse ($films as $film)
                    <div class="card m-2" style="width: 18rem;">
                        <img class="card-img-top pt-3" src="{{ asset('/assets/images/angelina.jpg') }}"
                            alt="{{ $film->title }}">
                        {{-- <img class="card-img-top" src="{{ asset('storage/' . $film->poster) }}" --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $film->title }} ({{ $film->release_year }})</h5>
                            <p class="bg-success p-1 text-center text-white rounded fw-bold" style="width: 100px">
                                {{ $film->reviews->avg('point') ? number_format($film->reviews->avg('point'), 0) : 'No Reviews' }}
                                / 100
                            </p>
                            <p class="card-text">{{ Str::limit($film->summary, 50) }}</p>
                            <div class="d-flex w-full justify-content-between">
                                <button type="button" class="btn btn-warning">
                                    {{ $film->genre->name }}
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#filmModal{{ $film->id }}">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="filmModal{{ $film->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="filmModalLabel{{ $film->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="filmModalLabel{{ $film->id }}">{{ $film->title }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img class="img-fluid mb-3" src="{{ asset('/assets/images/angelina.jpg') }}"
                                        alt="{{ $film->title }}">
                                    <p><strong>Genre:</strong> {{ $film->genre->name }}</p>

                                    <!-- Menampilkan Rating Rata-rata -->
                                    <p class="bg-success p-1 text-center text-white rounded fw-bold"
                                        style="width: 100px">
                                        {{ $film->reviews->avg('point') ? number_format($film->reviews->avg('point'), 0) : 'No Reviews' }}
                                        / 100
                                    </p>

                                    <p><strong>Rilis:</strong> {{ $film->release_year }}</p>
                                    <p><strong>Ringkasan:</strong> {{ $film->summary }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <p class="mx-auto">Tidak ada film yang tersedia.</p>
                @endforelse
            </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>

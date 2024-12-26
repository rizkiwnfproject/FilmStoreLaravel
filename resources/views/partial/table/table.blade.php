@extends('layout.home')
@section('judul')
    Dashboard
@endsection
@section('content')
    <main>
        <div class="" style="">
            <div class="d-grid gap-3">
                <div class="row">
                    @forelse ($films as $film)
                        <div class="col-sm-3">
                            <div class="card" style="width: 17rem;">
                                <img src="{{ asset('uploads/' . $film->poster) }}" alt="Poster" class="img-thumbnail" style="height: 200px; object-fit: cover; object-position: top ; width: 100%;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $film->title }} ({{ $film->release_year }})</h5>
                                    <p class="bg-success  text-center mt-1 pt-2 text-white rounded fw-bold"
                                        style="width: 100px; height: 40px;">
                                        {{ $film->reviews->avg('point') ? number_format($film->reviews->avg('point'), 0) : '0' }}
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
            </div>
    </main>
@endsection

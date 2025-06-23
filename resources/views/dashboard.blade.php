@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Selamat Datang di Dashboard</h1>

    {{-- Statistik Card --}}
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h2 class="card-title text-white">Jumlah Berita</h2>
                    <p class="display-5">{{ $jumlahBerita }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h2 class="card-title text-white">Jumlah Galeri</h2>
                    <p class="display-5">{{ $jumlahGaleri }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <h2 class="card-title text-white">Jumlah Pesan Kontak</h2>
                    <p class="display-5">{{ $jumlahPesan }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Pesan Terbaru --}}
    <div class="card mt-4 shadow">
        <div class="card-header bg-light">
            <h5 class="mb-0">5 Pesan Kontak Terbaru</h5>
        </div>
        <ul class="list-group list-group-flush">
            @forelse($pesanTerakhir as $pesan)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $pesan->name }} <small class="text-muted">({{ $pesan->subject }})</small></div>
                        <div class="text-muted small mb-1">{{ $pesan->created_at->format('d M Y, H:i') }}</div>
                        {{ \Illuminate\Support\Str::limit($pesan->message, 80) }}
                    </div>
                    <a href="{{ route('kontak.show', $pesan->id) }}" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                </li>
            @empty
                <li class="list-group-item text-muted">Belum ada pesan masuk.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection

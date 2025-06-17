@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Detail Pesan Kontak</h2>

        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $kontak->subject }}</h4>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nama:</strong> {{ $kontak->nama }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $kontak->email }}</li>
                    <li class="list-group-item"><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($kontak->created_at)->translatedFormat('l, d F Y - H:i') }}</li>
                    <li class="list-group-item"><strong>Pesan:</strong><br><p class="mt-2">{{ $kontak->pesan }}</p></li>
                </ul>

                <a href="{{ route('kontak.index') }}" class="btn btn-secondary mt-4">Kembali</a>
            </div>
        </div>
    </div>
@endsection

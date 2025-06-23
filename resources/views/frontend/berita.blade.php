@extends('frontend.layouts.app')
@section('title', 'Berita Kami')
@section('judul_hero', 'BERITA KAMI')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/frontend-berita.css') }}">
@endpush

@section('content')
    <!-- Artikel Utama -->
    <section class="section artikel-utama">
        <div class="container">
            <div class="artikel-wrapper">
                <div class="gambar-artikel">
                    <img src="{{ asset($beritaUtama->gambar) }}" alt="Gambar Berita">
                </div>
                <div class="konten-artikel">
                    <h2 class="judul-artikel">{{ $beritaUtama->judul }}</h2>
                    <p class="isi-artikel">{{ $beritaUtama->isi }}</p>
                    <a href="{{ route('berita.show', $beritaUtama->id) }}" class="btn-selengkapnya">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Daftar Berita Lainnya -->
    <section class="section berita-lainnya">
        <div class="container">
            <h2 class="judul-section">BERITA LAINNYA</h2>
            <div class="grid-berita">
                @foreach ($beritaLainnya as $berita)
                    <div class="card-berita" style="{{ $loop->index >= 8 ? 'display: none;' : '' }}">
                        <img src="{{ asset($berita->gambar) }}" alt="gambar berita {{ $loop->iteration }}">
                        <div class="isi-card">
                            <h3 class="judul-card">{{ $berita->judul }}</h3>
                            <p class="ringkasan-card">{{ Str::limit(strip_tags($berita->isi), 100) }}</p>
                            <div class="bawah-card">
                                <a href="{{ route('berita.show', $berita->id) }}" class="link-selengkapnya">Baca
                                    selengkapnya</a>
                                <span class="titik-tiga">...</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($beritaLainnya->count() > 8)
                <div class="tombol-load">
                    <button id="loadMoreBtn">Lihat Berita Lainnya</button>
                </div>
            @endif

        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.card-berita');
            const loadBtn = document.getElementById('loadMoreBtn');
            let visible = 8;

            cards.forEach((card, i) => {
                if (i >= visible) card.style.display = 'none';
            });

            if (loadBtn) {
                loadBtn.addEventListener('click', () => {
                    let total = visible + 8;
                    cards.forEach((card, i) => {
                        if (i < total) card.style.display = 'block';
                    });
                    visible = total;
                    if (visible >= cards.length) loadBtn.style.display = 'none';
                });
            }
        });
    </script>
@endpush

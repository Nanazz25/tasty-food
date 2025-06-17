@extends('frontend.layouts.app')
@section('title', $berita->judul)
@section('judul_hero', 'DETAIL BERITA')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/frontend-berita.css') }}">
@endpush

@section('content')

    <section class="section detail-berita">
        <div class="container">
            <div class="detail-wrapper">
                <div class="gambar-detail">
                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}">
                </div>
                <div class="konten-detail">
                    <h2 class="judul-detail">{{ $berita->judul }}</h2>
                    <p style="text-align: center; color: #888; font-size: 14px; margin-bottom: 10px;">
                        Dipublikasikan pada: {{ $berita->created_at->translatedFormat('d F Y') }}
                    </p>
                    <hr style="margin-bottom: 20px;">

                    <div class="isi-detail">
                        {!! $berita->isi !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

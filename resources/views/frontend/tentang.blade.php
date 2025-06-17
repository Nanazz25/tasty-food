@extends('frontend.layouts.app')
@section('title', 'Tentang Kami')

@section('judul_hero', 'TENTANG KAMI')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/frontend-tentang.css') }}">
@endpush

@section('content')
    {{-- TASTY FOOD --}}
    <div class="container-tasty">
        <div class="text">
            <h2 class="judul-section">{{ $tastyFood->judul }}</h2>
            <div class="isi">{!! $tastyFood->isi !!}</div>
        </div>
        <div class="images-horizontal">
            <img src="{{ asset($tastyFood->gambar_kiri) }}" alt="gambar kiri">
            <img src="{{ asset($tastyFood->gambar_kanan) }}" alt="gambar kanan">
        </div>
    </div>

    {{-- VISI --}}
    <div class="container-visi">
        <div class="images-horizontal">
            <img src="{{ asset($visi->gambar_kiri) }}" alt="visi kiri">
            <img src="{{ asset($visi->gambar_kanan) }}" alt="visi kanan">
        </div>
        <div class="text">
            <h2 class="judul-section">{{ $visi->judul }}</h2>
            <p>{!! $visi->isi !!}</p>
        </div>
    </div>

    {{-- MISI --}}
    <div class="container-misi">
        <div class="text">
            <h2 class="judul-section">{{ $misi->judul }}</h2>
            <p>{!! $misi->isi !!}</p>
        </div>
        <div class="image-wide">
            <img src="{{ asset($misi->gambar_kiri) }}" alt="misi image">
        </div>
    </div>

@endsection

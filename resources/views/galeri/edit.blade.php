@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Gambar Galeri</h2>

        <div class="card mt-11">
            <div class="card-body">
                <form action="{{ route('galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label>Nama Gambar</label>
                        <input type="text" name="nama_gambar"
                            class="form-control @error('nama_gambar') is-invalid @enderror"
                            value="{{ old('nama-gambar', $galeri->nama_gambar) }}">
                        @error('nama_gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Ganti Gambar (kosongkan jika tidak ingin diganti)</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($galeri->gambar)
                        <div class="mb-3">
                            <label class="form-label d-block">Gambar Saat Ini:</label>
                            <img src="{{ asset($galeri->gambar) }}" alt="Gambar" style="width: 200px; height: 150px; object-fit: contain; background-color: #f8f9fa;" class="rounded border">
                        </div>
                    @endif

                    <button class="btn btn-primary">Perbarui</button>
                    <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection

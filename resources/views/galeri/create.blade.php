@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Gambar Galeri</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Nama Gambar</label>
                    <input type="text" name="nama_gambar" class="form-control @error('nam_-gambar') is-invalid @enderror" value="{{ old('nama-gambar') }}">
                    @error('nama_gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>File Gambar</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                    @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

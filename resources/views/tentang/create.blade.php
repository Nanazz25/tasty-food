@extends('layouts.admin')
@section('title', 'Tambah Tentang')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Tambah Data Tentang</div>
            <div class="card-body">
                <form action="{{ route('tentang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul') }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi</label>
                        <input id="isi" type="hidden" name="isi" value="{{ old('isi') }}">
                        <trix-editor input="isi"></trix-editor>
                        @error('isi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambar_kiri" class="form-label">Gambar Kiri</label>
                        <input type="file" name="gambar_kiri" class="form-control">
                        @error('gambar_kiri')
                            <div class="text-danger">{{ $message }}</div> {{-- Tampilkan pesan error di sini --}}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar_kanan" class="form-label">Gambar Kanan</label>
                        <input type="file" name="gambar_kanan" class="form-control">
                        @error('gambar_kanan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('tentang.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection

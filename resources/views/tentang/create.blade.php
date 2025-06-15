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
                    <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul') }}" required>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi</label>
                    <textarea name="isi" id="isi" rows="4" class="form-control" required>{{ old('isi') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('tentang.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection

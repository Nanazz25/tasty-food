@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Berita</h2>

    <div class="col-12">
        <div class="card mt-11">
            <div class="card-body">
                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Berita</label>
                        <textarea name="isi" class="form-control" rows="5" required>{{ old('isi') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar (Opsional)</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

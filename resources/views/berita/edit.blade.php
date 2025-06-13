@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="">Edit Berita</h2>

        <div class="col-12 mt-11">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control"
                                value="{{ old('judul', $berita->judul) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi Berita</label>
                            <textarea name="isi" class="form-control" rows="5" required>{{ old('isi', $berita->isi) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gambar Saat Ini</label><br>
                            @if ($berita->gambar)
                                <img src="{{ asset($berita->gambar) }}" width="150" class="mb-2" alt="gambar">
                            @else
                                <p class="text-muted">Tidak ada gambar</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Ganti Gambar (Opsional)</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

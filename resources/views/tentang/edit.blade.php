@extends('layouts.admin')
@section('title', 'Edit Tentang')
@section('content')
    <div class="container">

        <h2>Edit Tentang</h2>

        <div class="col-12 mt-11">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tentang.update', $tentang) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul"
                                value="{{ old('judul', $tentang->judul) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi</label>
                            <textarea name="isi" id="isi" rows="4" class="form-control" required>{{ old('isi', $tentang->isi) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gambar Saat Ini</label><br>
                            @if ($tentang->gambar)
                                <img src="{{ asset($tentang->gambar) }}" width="150" class="mb-2" alt="gambar">
                            @else
                                <p class="text-muted">Tidak ada gambar</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Ganti Gambar (Opsional)</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('tentang.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

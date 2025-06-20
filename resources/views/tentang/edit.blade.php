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
                            <input id="isi" type="hidden" name="isi" value="{{ old('isi', $tentang->isi) }}">
                            <trix-editor input="isi"></trix-editor>
                            @error('isi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Gambar Kiri Saat Ini</label><br>
                            @if ($tentang->gambar_kiri)
                                <img src="{{ asset($tentang->gambar_kiri) }}" width="150" class="mb-2"
                                    alt="gambar kiri">
                            @else
                                <p class="text-muted">Tidak ada gambar kiri</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="gambar_kiri" class="form-label">Ganti Gambar Kiri (Opsional)</label>
                            <input type="file" name="gambar_kiri" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gambar Kanan Saat Ini</label><br>
                            @if ($tentang->gambar_kanan)
                                <img src="{{ asset($tentang->gambar_kanan) }}" width="150" class="mb-2"
                                    alt="gambar kanan">
                            @else
                                <p class="text-muted">Tidak ada gambar kanan</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="gambar_kanan" class="form-label">Ganti Gambar Kanan (Opsional)</label>
                            <input type="file" name="gambar_kanan" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('tentang.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

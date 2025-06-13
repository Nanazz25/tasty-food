@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mb-4">Data Galeri</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card mt-11">
            <div class="card-body">
                <div class="d-md-flex align-items-center mb-3">
                    <div>
                        <h4 class="card-title">Galeri</h4>
                        <p class="card-subtitle">Daftar Gambar Galeri</p>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('galeri.create') }}" class="btn btn-primary">+ Tambah Gambar</a>
                    </div>
                </div>

                <div class="table-responsive mt-4">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                        <thead>
                            <tr>
                                <th scope="col" class="px-0 text-muted">Nama Gambar</th>
                                <th scope="col" class="px-0 text-muted">Preview</th>
                                <th scope="col" class="px-0 text-muted">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galeri as $item)
                                <tr>
                                    <td class="px-0">{{ $item->nama_gambar }}</td>
                                    <td class="px-0">
                                        <a href="{{ asset($item->gambar) }}" target="_blank">
                                            <img src="{{ asset($item->gambar) }}" alt="Gambar" style="width: 200px; height: 150px; object-fit: contain; background-color: #f8f9fa;" class="rounded border">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('galeri.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('galeri.destroy', $item) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus gambar ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Belum ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Data Berita</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="col-12 mt-11">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Data Berita</h4>
                        <p class="card-subtitle">Tabel Berita</p>
                    </div>
                    <div class="ms-auto mt-3 mt-md-0">
                        <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">+ Tambah Berita</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                        <thead>
                            <tr>
                                <th scope="col" class="px-0 text-muted">Judul</th>
                                <th scope="col" class="px-0 text-muted">Isi</th>
                                <th scope="col" class="px-0 text-muted">Gambar</th>
                                <th scope="col" class="px-0 text-muted">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berita as $item)
                                <tr>
                                    <td class="px-0">{{ $item->judul }}</td>
                                    <td class="px-0">{{ Str::limit(strip_tags($item->isi), 80) }}</td>
                                    <td class="px-0">
                                        @if ($item->gambar)
                                            <a href="{{ asset($item->gambar) }}" target="_blank">
                                                <img src="{{ asset($item->gambar) }}" width="100" alt="gambar" style="width: 200px; height: 150px; object-fit: contain; background-color: #f8f9fa;" class="rounded border">
                                            </a>
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="px-0">
                                        <a href="{{ route('berita.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('berita.destroy', $item) }}" method="POST"
                                              style="display:inline-block" onsubmit="return confirm('Yakin ingin hapus?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($berita->isEmpty())
                                <tr>
                                    <td colspan="3" class="text-center text-muted">Belum ada data berita.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Daftar Tentang</h2>

        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif

        <div class="col-12 mt-11">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Data Tentang</h4>
                            <p class="card-subtitle">
                                Table Tentang
                            </p>
                        </div>
                        <div class="ms-auto mt-3 mt-md-0">
                            <a href="{{ route('tentang.create') }}" class="btn btn-primary mb-3">+ Tambah Tentang</a>
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
                                @foreach ($tentang as $item)
                                    <tr>
                                        <td class="px-0">{{ $item->judul }}</td>
                                        <td class="px-0">{{ Str::limit($item->isi, 100) }}</td>
                                        <td class="px-0">
                                            @if ($item->gambar)
                                                <img src="/{{ $item->gambar }}"
                                                    style="width: 200px; height: 150px; object-fit: contain; background-color: #f8f9fa;"
                                                    class="rounded border">
                                            @endif
                                        </td>
                                        <td class="px-0">
                                            <a href="{{ route('tentang.edit', $item) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('tentang.destroy', $item) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Hapus role ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

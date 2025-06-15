@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Data Kontak</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="col-12 mt-11">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Data Kontak</h4>
                            <p class="card-subtitle">Pesan dari pengunjung</p>
                        </div>
                        <div class="ms-auto mt-3 mt-md-0">
                            <a href="{{ route('kontak.create') }}" class="btn btn-primary mb-3">+ Tambah Kontak</a>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                            <thead>
                                <tr>
                                    <th class="px-0 text-muted">Subject</th>
                                    <th class="px-0 text-muted">Nama</th>
                                    <th class="px-0 text-muted">Email</th>
                                    <th class="px-0 text-muted">Pesan</th>
                                    <th class="px-0 text-muted">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kontak as $item)
                                    <tr>
                                        <td class="px-0">{{ $item->subject }}</td>
                                        <td class="px-0">{{ $item->nama }}</td>
                                        <td class="px-0">{{ $item->email }}</td>
                                        <td class="px-0">{{ Str::limit($item->pesan, 50) }}</td>
                                        <td class="px-0">
                                            <a href="{{ route('kontak.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('kontak.destroy', $item) }}" method="POST" style="display:inline-block">
                                                @csrf @method('DELETE')
                                                <button onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($kontak->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada data kontak.</td>
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

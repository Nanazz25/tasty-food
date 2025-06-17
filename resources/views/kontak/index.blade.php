@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Data Kontak</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center mb-3">
                        <div>
                            <h4 class="card-title">Pesan dari Pengunjung</h4>
                            <p class="card-subtitle">Menampilkan pesan terbaru</p>
                        </div>
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-2 text-muted">Subject</th>
                                    <th scope="col" class="px-2 text-muted">Nama</th>
                                    <th scope="col" class="px-2 text-muted">Email</th>
                                    <th scope="col" class="px-2 text-muted">Pesan</th>
                                    <th scope="col" class="px-2 text-muted">Dikirim</th>
                                    <th scope="col" class="px-2 text-muted">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kontak as $item)
                                    <tr>
                                        <td class="px-2">{{ $item->subject }}</td>
                                        <td class="px-2">{{ $item->nama }}</td>
                                        <td class="px-2">{{ $item->email }}</td>
                                        <td class="px-2">{{ Str::limit($item->pesan, 50) }}</td>
                                        <td class="px-2">{{ $item->created_at->translatedFormat('d M Y, H:i') }}</td>
                                        <td class="px-2">
                                            <a href="{{ route('kontak.show', $item) }}" class="btn btn-info btn-sm">Lihat</a>
                                            <form action="{{ route('kontak.destroy', $item) }}" method="POST" style="display:inline-block">
                                                @csrf @method('DELETE')
                                                <button onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada data kontak.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

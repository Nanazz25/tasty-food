@extends('layouts.admin')

@section('title', 'Admin Berita')

@section('content')
    <div class="container">
        <h2>Data Berita</h2>

        {{-- SweetAlert Success --}}
        @if (session('success'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
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
                                    <th class="text-muted">Judul</th>
                                    <th class="text-muted">Isi</th>
                                    <th class="text-muted">Gambar</th>
                                    <th class="text-muted">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($berita as $item)
                                    <tr>
                                        {{-- Judul dengan limit + wrap --}}
                                        <td class="text-wrap" style="max-width: 200px;">
                                            {{ Str::limit($item->judul, 60) }}
                                        </td>

                                        {{-- Isi dengan limit 80 dan tanpa tag HTML --}}
                                        <td class="text-wrap" style="max-width: 250px;">
                                            {{ Str::limit(strip_tags($item->isi), 80) }}
                                        </td>

                                        {{-- Gambar --}}
                                        <td>
                                            @if ($item->gambar)
                                                <a href="{{ asset($item->gambar) }}" target="_blank">
                                                    <img src="{{ asset($item->gambar) }}" width="200" height="150"
                                                        class="rounded border"
                                                        style="object-fit: contain; background-color: #f8f9fa;">
                                                </a>
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </td>

                                        {{-- Aksi --}}
                                        <td>
                                            <a href="{{ route('berita.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>

                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="hapusBerita('{{ $item->id }}')">Hapus</button>

                                            <form id="form-hapus-{{ $item->id }}" action="{{ route('berita.destroy', $item) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Belum ada data berita.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- SweetAlert untuk konfirmasi hapus --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function hapusBerita(id) {
            Swal.fire({
                title: 'Yakin ingin hapus?',
                text: "Data berita akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-hapus-' + id).submit();
                }
            });
        }
    </script>
@endsection

@extends('layouts.admin')

@section('title', 'Admin Galeri')

@section('content')
    <div class="container">
        <h2 class="mb-4">Data Galeri</h2>

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
                                <th class="px-0 text-muted">Nama Gambar</th>
                                <th class="px-0 text-muted">Preview</th>
                                <th class="px-0 text-muted">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galeri as $item)
                                <tr>
                                    <td class="px-0 text-wrap" style="max-width: 250px;">
                                        {{ Str::limit($item->nama_gambar, 60) }}
                                    </td>
                                    <td class="px-0">
                                        <a href="{{ asset($item->gambar) }}" target="_blank">
                                            <img src="{{ asset($item->gambar) }}" alt="Gambar"
                                                class="rounded border"
                                                style="width: 200px; height: 150px; object-fit: contain; background-color: #f8f9fa;">
                                        </a>
                                    </td>
                                    <td class="px-0">
                                        <a href="{{ route('galeri.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="hapusGaleri('{{ $item->id }}')">Hapus</button>

                                        <form id="form-hapus-{{ $item->id }}"
                                              action="{{ route('galeri.destroy', $item) }}"
                                              method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">Belum ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- SweetAlert untuk konfirmasi hapus --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function hapusGaleri(id) {
            Swal.fire({
                title: 'Yakin ingin hapus?',
                text: "Gambar ini akan dihapus permanen!",
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

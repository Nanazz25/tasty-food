@extends('layouts.admin')

@section('title', 'Admin Tentang')

@section('content')
    <div class="container">
        <h2>Daftar Tentang</h2>

        {{-- Notifikasi sukses --}}
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
                            <h4 class="card-title">Data Tentang</h4>
                            <p class="card-subtitle">Table Tentang</p>
                        </div>
                        <div class="ms-auto mt-3 mt-md-0">
                            <a href="{{ route('tentang.create') }}" class="btn btn-primary mb-3">+ Tambah Tentang</a>
                        </div>
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                            <thead>
                                <tr>
                                    <th class="px-0 text-muted">Judul</th>
                                    <th class="px-2 text-muted">Isi</th>
                                    <th class="px-0 text-muted">Gambar Kiri</th>
                                    <th class="px-2 text-muted">Gambar Kanan</th>
                                    <th class="px-0 text-muted">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tentang as $item)
                                    <tr>
                                        <td class="px-0">{{ $item->judul }}</td>
                                        <td class="px-2 text-wrap" style="max-width: 300px;">
                                            {{ Str::limit(strip_tags($item->isi), 100) }}
                                        </td>
                                        <td class="px-0">
                                            @if ($item->gambar_kiri)
                                                <img src="/{{ $item->gambar_kiri }}"
                                                    class="rounded border"
                                                    style="width: 150px; height: 100px; object-fit: contain;">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="px-0">
                                            @if ($item->gambar_kanan)
                                                <img src="/{{ $item->gambar_kanan }}"
                                                    class="rounded border"
                                                    style="width: 150px; height: 100px; object-fit: contain;">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="px-0">
                                            <a href="{{ route('tentang.edit', $item) }}"
                                               class="btn btn-sm btn-warning">Edit</a>

                                            <button type="button"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="hapusTentang('{{ $item->id }}')">Hapus</button>

                                            <form id="form-hapus-{{ $item->id }}"
                                                  action="{{ route('tentang.destroy', $item) }}"
                                                  method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada data Tentang.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- SweetAlert untuk hapus --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function hapusTentang(id) {
            Swal.fire({
                title: 'Yakin ingin hapus?',
                text: "Data ini akan dihapus permanen!",
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

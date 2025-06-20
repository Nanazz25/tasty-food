@extends('layouts.admin')

@section('title', 'Admin Kontak')

@section('content')
    <div class="container">
        <h2>Data Kontak</h2>

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
                                    <th class="px-2 text-muted">Subject</th>
                                    <th class="px-2 text-muted">Nama</th>
                                    <th class="px-2 text-muted">Email</th>
                                    <th class="px-2 text-muted">Pesan</th>
                                    <th class="px-2 text-muted">Dikirim</th>
                                    <th class="px-2 text-muted">Aksi</th>
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

                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="hapusKontak('{{ $item->id }}')">Hapus</button>

                                            <form id="form-hapus-{{ $item->id }}"
                                                  action="{{ route('kontak.destroy', $item) }}"
                                                  method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
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

    {{-- SweetAlert konfirmasi hapus --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function hapusKontak(id) {
            Swal.fire({
                title: 'Yakin ingin hapus?',
                text: "Pesan ini akan dihapus permanen!",
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

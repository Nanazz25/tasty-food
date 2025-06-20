@extends('layouts.admin')

@section('title', 'Admin Users')

@section('content')
    <div class="container">
        <h2>Data Users</h2>

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
                            <h4 class="card-title">Data Users</h4>
                            <p class="card-subtitle">Table User</p>
                        </div>
                        <div class="ms-auto mt-3 mt-md-0">
                            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">+ Tambah User</a>
                        </div>
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                            <thead>
                                <tr>
                                    <th class="px-0 text-muted">Nama</th>
                                    <th class="px-0 text-muted">Email</th>
                                    <th class="px-0 text-muted">Role</th>
                                    <th class="px-0 text-muted">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="px-0">{{ $user->name }}</td>
                                        <td class="px-0">{{ $user->email }}</td>
                                        <td class="px-0">{{ $user->role->name ?? '-' }}</td>
                                        <td class="px-0">
                                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>

                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="hapusUser('{{ $user->id }}')">Hapus</button>

                                            <form id="form-hapus-{{ $user->id }}"
                                                action="{{ route('users.destroy', $user) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Belum ada data user.</td>
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
        function hapusUser(userId) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "User akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-hapus-' + userId).submit();
                }
            });
        }
    </script>
@endsection

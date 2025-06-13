@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Daftar Role</h2>

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
                            <h4 class="card-title">Data Role</h4>
                            <p class="card-subtitle">
                                Table Role
                            </p>
                        </div>
                        <div class="ms-auto mt-3 mt-md-0">
                            <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">+ Tambah Role</a>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-0 text-muted">Nama Role</th>
                                    <th scope="col" class="px-0 text-muted">Akses Roles</th>
                                    <th scope="col" class="px-0 text-muted">Akses Users</th>
                                    <th scope="col" class="px-0 text-muted">Akses Galeri</th>
                                    <th scope="col" class="px-0 text-muted">Akses Berita</th>
                                    <th scope="col" class="px-0 text-muted">Akses Kontak</th>
                                    <th scope="col" class="px-0 text-muted">Akses Tentang</th>
                                    <th scope="col" class="px-0 text-muted">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="px-0">{{ $role->name }}</td>
                                        <td class="px-0">{{ $role->akses_roles ? 'Ya' : 'Tidak' }}</td>
                                        <td class="px-0">{{ $role->akses_users ? 'Ya' : 'Tidak' }}</td>
                                        <td class="px-0">{{ $role->akses_galeri ? 'Ya' : 'Tidak' }}</td>
                                        <td class="px-0">{{ $role->akses_berita ? 'Ya' : 'Tidak' }}</td>
                                        <td class="px-0">{{ $role->akses_kontak ? 'Ya' : 'Tidak' }}</td>
                                        <td class="px-0">{{ $role->akses_tentang ? 'Ya' : 'Tidak' }}</td>
                                        <td class="px-0">
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Hapus role ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                @if ($roles->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada role.</td>
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

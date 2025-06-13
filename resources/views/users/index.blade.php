@extends('layouts.admin')

@section('content')
    <div class="container">

        <h2>Data Users</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="col-12 mt-11">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Data Users</h4>
                            <p class="card-subtitle">
                               Table User
                            </p>
                        </div>
                        <div class="ms-auto mt-3 mt-md-0">
                            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">+ Tambah User</a>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-0 text-muted">Nama</th>
                                    <th scope="col" class="px-0 text-muted">Email</th>
                                    <th scope="col" class="px-0 text-muted">Role</th>
                                    <th scope="col" class="px-0 text-muted">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-0">{{ $user->name }}</td>
                                        <td class="px-0">{{ $user->email }}</td>
                                        <td class="px-0">{{ $user->role->name ?? '-' }}</td>
                                        <td class="px-0">
                                            <a href="{{ route('users.edit', $user) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                                style="display:inline-block">
                                                @csrf @method('DELETE')
                                                <button onclick="return confirm('Hapus user ini?')"
                                                    class="btn btn-danger btn-sm">Hapus</button>
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

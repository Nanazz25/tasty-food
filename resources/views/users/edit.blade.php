@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">

            <div class="card shadow-sm border-0 mt-11">

                <div class="card-body">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password (Kosongkan jika tidak diubah)</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="mb-4">
                            <label for="role_id" class="form-label">Role</label>
                            <select name="role_id" id="role_id" class="form-select" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection

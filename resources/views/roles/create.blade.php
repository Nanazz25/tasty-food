@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Role Baru</h2>

    <form action="{{ route('roles.store') }}" method="POST" class="mt-11">
        @csrf

        <div class="mb-3">
            <label>Nama Role</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <h5>Akses Fitur:</h5>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="akses_roles" id="roles">
            <label for="roles" class="form-check-label">Akses Roles</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="akses_users" id="users">
            <label for="users" class="form-check-label">Akses Users</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="akses_galeri" id="galeri">
            <label for="galeri" class="form-check-label">Akses Galeri</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="akses_berita" id="berita">
            <label for="berita" class="form-check-label">Akses Berita</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="akses_kontak" id="kontak">
            <label for="kontak" class="form-check-label">Akses Kontak</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="akses_tentang" id="tentang">
            <label for="tentang" class="form-check-label">Akses Tentang</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection

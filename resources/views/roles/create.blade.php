@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Card Start -->
            <div class="card shadow-sm mt-11">
                <div class="card-body">
                    <!-- Form Start -->
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf

                        {{-- Input Nama Role --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Role</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Contoh: Admin, Editor" required>
                        </div>

                        {{-- Akses Fitur --}}
                        <div class="mb-3">
                            <label class="form-label">Akses Fitur</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" name="akses_roles" id="akses_roles">
                                        <label for="akses_roles" class="form-check-label">Akses Roles</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" name="akses_users" id="akses_users">
                                        <label for="akses_users" class="form-check-label">Akses Users</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" name="akses_galeri" id="akses_galeri">
                                        <label for="akses_galeri" class="form-check-label">Akses Galeri</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" name="akses_berita" id="akses_berita">
                                        <label for="akses_berita" class="form-check-label">Akses Berita</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" name="akses_kontak" id="akses_kontak">
                                        <label for="akses_kontak" class="form-check-label">Akses Kontak</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" name="akses_tentang" id="akses_tentang">
                                        <label for="akses_tentang" class="form-check-label">Akses Tentang</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Role</button>
                        </div>
                    </form>
                    <!-- Form End -->
                </div>
            </div>
            <!-- Card End -->
        </div>
    </div>
</div>
@endsection

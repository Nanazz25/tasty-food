@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="col-12 mt-11">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Kontak</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('kontak.update', $kontak) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" value="{{ old('subject', $kontak->subject) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $kontak->nama) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $kontak->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" name="pesan" id="pesan" rows="5" required>{{ old('pesan', $kontak->pesan) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="{{ route('kontak.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

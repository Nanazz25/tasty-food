@extends('frontend.layouts.app')
@section('title', 'Kontak Kami')
@section('judul_hero', 'KONTAK KAMI')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/frontend-kontak.css') }}">
@endpush

@section('content')
    <section class="section kontak-form-section">
        <div class="container">
            <h2 class="judul-section">KONTAK KAMI</h2>
            <form id="form-kontak">
                @csrf
                <div class="form-kontak">
                    <div class="form-left">
                        <input type="text" name="subject" placeholder="Subject" required>
                        <input type="text" name="nama" placeholder="Name" required>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-right">
                        <textarea name="pesan" placeholder="Message" required></textarea>
                    </div>
                    <button type="submit" class="btn-kirim">KIRIM</button>
                </div>
            </form>

            {{-- Info Kontak --}}
            <div class="info-kontak">
                <div class="item">
                    <i class="fas fa-envelope"></i>
                    <h4>EMAIL</h4>
                    <p>tastyfood@gmail.com</p>
                </div>
                <div class="item">
                    <i class="fas fa-phone-alt"></i>
                    <h4>PHONE</h4>
                    <p>+62 812 3456 7890</p>
                </div>
                <div class="item">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>LOCATION</h4>
                    <p>Kota Bandung, Jawa Barat</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mulai maps full width -->
    <section class="maps-section">
        <div class="maps-wrapper">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5588068405114!2d107.66141237504385!3d-6.943211393056879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7c381e3c323%3A0x5f5160f6c9796e4b!2sCYBERLABS%20-%20Jasa%20Digital%20Marketing%20%7C%20Jasa%20Pembuatan%20Website%20%7C%20Jasa%20Pembuatan%20Aplikasi!5e0!3m2!1sid!2sid!4v1750174852913!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('form-kontak').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = e.target;
            const data = new FormData(form);

            try {
                const response = await fetch("{{ route('kontak.store') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    },
                    body: data
                });

                if (!response.ok) throw await response.json();

                form.reset();

                Swal.fire({
                    icon: 'success',
                    title: 'Pesan Terkirim!',
                    text: 'Terima kasih telah menghubungi kami.',
                    confirmButtonText: 'Tutup'
                });

            } catch (error) {
                let msg = 'Terjadi kesalahan. Pastikan semua field terisi.';
                if (error.errors) {
                    msg = Object.values(error.errors).join('\n');
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Mengirim!',
                    text: msg,
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>
@endpush

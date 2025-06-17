@extends('frontend.layouts.app')
@section('title', 'Galeri Kami')
@section('judul_hero', 'GALERI KAMI')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/frontend-galeri.css') }}">
@endpush

@section('content')

    <!-- Carousel Section -->
    @if ($galeriAll->count())
        <section class="carousel-galeri">
            <div class="carousel-wrapper">
                <div class="carousel-slide">
                    <img src="{{ asset($galeriAll[0]->gambar) }}" alt="gambar galeri pertama" id="carousel-image">
                </div>
                <button class="carousel-btn left">&#8249;</button>
                <button class="carousel-btn right">&#8250;</button>
            </div>
        </section>
    @endif


    <section class="section grid-galeri">
        <div class="container">
            <div class="galeri-grid" id="galeri-grid">
                @foreach ($galeriAll as $item)
                    <div class="galeri-item" style="{{ $loop->index >= 12 ? 'display: none;' : '' }}">
                        <img src="{{ asset($item->gambar) }}" alt="gambar galeri {{ $loop->iteration }}">
                    </div>
                @endforeach
            </div>

            @if ($galeriAll->count() > 12)
                <div class="load-more-wrapper">
                    <button id="load-more-btn" class="load-more-btn">Lihat Gambar Lainnya</button>
                </div>
            @endif
        </div>
    </section>


@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const prevBtn = document.querySelector('.carousel-btn.left');
            const nextBtn = document.querySelector('.carousel-btn.right');
            const slideImg = document.getElementById('carousel-image');
            const images = @json($galeriAll->pluck('gambar'));
            let current = 0;
            let intervalId;

            function updateSlide(direction = 1) {
                slideImg.classList.remove('slide-animate');
                void slideImg.offsetWidth; // trigger reflow
                slideImg.classList.add('slide-animate');

                slideImg.style.transition = 'none';
                slideImg.src = `/${images[current]}`;
            }

            function nextSlide() {
                current = (current + 1) % images.length;
                updateSlide(1);
            }

            function prevSlide() {
                current = (current - 1 + images.length) % images.length;
                updateSlide(-1);
            }

            nextBtn?.addEventListener('click', () => {
                nextSlide();
                resetAutoSlide();
            });

            prevBtn?.addEventListener('click', () => {
                prevSlide();
                resetAutoSlide();
            });

            function resetAutoSlide() {
                clearInterval(intervalId);
                intervalId = setInterval(nextSlide, 6000);
            }

            intervalId = setInterval(nextSlide, 6000);
            updateSlide();
        });

        document.addEventListener('DOMContentLoaded', () => {
            const items = document.querySelectorAll('.galeri-item');
            const loadMoreBtn = document.getElementById('load-more-btn');
            let currentVisible = 12;

            loadMoreBtn?.addEventListener('click', () => {
                const nextVisible = currentVisible + 12;
                for (let i = currentVisible; i < nextVisible && i < items.length; i++) {
                    items[i].style.display = 'block';
                }
                currentVisible = nextVisible;

                if (currentVisible >= items.length) {
                    loadMoreBtn.style.display = 'none';
                }
            });
        });
    </script>
@endpush

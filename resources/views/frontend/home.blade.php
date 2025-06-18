<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Home - Tasty Food</title>
    <link rel="stylesheet" href="{{ asset('css/frontend-home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <header class="home-header">
        <div class="navbar-home">
            <div class="logo">TASTY FOOD</div>
            <nav class="menu">
                <a href="/">HOME</a>
                <a href="/tentang">TENTANG</a>
                <a href="/berita">BERITA</a>
                <a href="/galeri">GALERI</a>
                <a href="/kontak">KONTAK</a>
            </nav>
            <img src="{{ asset('aset/img-4-2000x2000.png') }}" alt="Gambar Header" class="header-image">
        </div>

        <div class="hero-content-wrapper">
            <div class="hero-content">
                <hr class="header-line">
                <h2>HEALTHY</h2>
                <h1>TASTY FOOD</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ornare neque, quis vehicula
                    orci. Suspendisse vel gravida urna. Praesent dapibus semper dignissim. Curabitur vel enim lorem. Nam
                    a dapibus tortor.
                </p>
                <a href="/tentang" class="btn-tentang">TENTANG KAMI</a>
            </div>
        </div>
    </header>


    <section class="tentang-kami-section">
        <h2>TENTANG KAMI</h2>
        <p>{!! $tentang->isi ?? '-' !!}</p>
        <hr class="line-bawah-isi">
    </section>

    <section class="card-dummy-section">
        <div class="card-dummy-container">
            <div class="dummy-card">
                <img src="{{ asset('aset/img-1.png') }}" alt="Card">
                <h3>LOREM IPSUM</h3>
                <p>Lorem ipsum dolor sit amet, Phasellus ornare, augue eu rutrum commodo.</p>
            </div>
            <div class="dummy-card">
                <img src="{{ asset('aset/img-2.png') }}" alt="Card">
                <h3>LOREM IPSUM</h3>
                <p>Lorem ipsum dolor sit amet, Phasellus ornare, augue eu rutrum commodo.</p>
            </div>
            <div class="dummy-card">
                <img src="{{ asset('aset/img-3.png') }}" alt="Card">
                <h3>LOREM IPSUM</h3>
                <p>Lorem ipsum dolor sit amet, Phasellus ornare, augue eu rutrum commodo.</p>
            </div>
            <div class="dummy-card">
                <img src="{{ asset('aset/img-4.png') }}" alt="Card">
                <h3>LOREM IPSUM</h3>
                <p>Lorem ipsum dolor sit amet, Phasellus ornare, augue eu rutrum commodo.</p>
            </div>
        </div>
    </section>

    <section class="berita-home">
        <h2 class="section-title">BERITA KAMI</h2>
        <div class="berita-grid">
            @if ($berita->count())
                <div class="card-berita besar">
                    <img src="{{ asset($berita[0]->gambar) }}" alt="gambar berita pertama">
                    <div class="isi-card">
                        <h3 class="judul-card">{{ $berita[0]->judul }}</h3>
                        <p class="ringkasan-card">{{ Str::limit(strip_tags($berita[0]->isi), 1000) }}</p>
                        <div class="bawah-card">
                            <a href="{{ route('berita.show', $berita[0]->id) }}" class="link-selengkapnya">Baca
                                selengkapnya</a>
                            <div class="titik-tiga">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="berita-kecil-grid">
                    @foreach ($berita->skip(1)->take(4) as $item)
                        <div class="card-berita persegi">
                            <img src="{{ asset($item->gambar) }}" alt="gambar berita {{ $loop->iteration }}">
                            <div class="isi-card">
                                <h3 class="judul-card">{{ $item->judul }}</h3>
                                <p class="ringkasan-card">{{ Str::limit(strip_tags($item->isi), 100) }}</p>
                                <div class="bawah-card">
                                    <a href="{{ route('berita.show', $item->id) }}" class="link-selengkapnya">Baca
                                        selengkapnya</a>
                                    <div class="titik-tiga">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="galeri-home">
        <h2 class="section-title">GALERI</h2>
        <div class="galeri-grid">
            @foreach ($galeri as $item)
                <div class="galeri-item">
                    <img src="{{ asset($item->gambar) }}" alt="Galeri {{ $loop->iteration }}">
                </div>
            @endforeach
        </div>
        <div class="btn-lihat-semua-container">
            <a href="/galeri" class="btn-lihat-semua">LIHAT SEMUA</a>
        </div>
    </section>


    {{-- === FOOTER === --}}
    @include('frontend.layouts.footer')

</body>

</html>

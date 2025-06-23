<header style="position: relative; height: 600px;">
    <div
        style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100%;
        background: url('{{ asset('aset/Group 70@2x.png') }}') center/cover no-repeat;
        z-index: -1;
    ">
    </div>

    <nav class="navbar">
        <div style="font-size: 28px; font-weight: bold; cursor: pointer;">
            TASTY FOOD
        </div>

        <ul class="menu-desktop">
            <li><a href="{{ route('frontend.home') }}">HOME</a></li>
            <li><a href="{{ route('frontend.tentang') }}">TENTANG</a></li>
            <li><a href="{{ route('frontend.berita') }}">BERITA</a></li>
            <li><a href="{{ route('frontend.galeri') }}">GALERI</a></li>
            <li><a href="{{ route('frontend.kontak') }}">KONTAK</a></li>
        </ul>

        <div class="burger-icon" onclick="toggleMenu(this)">
            <span class="line1"></span>
            <span class="line2"></span>
            <span class="line3"></span>
        </div>

        <ul id="navbar-menu" class="menu-popup">
            <li><a href="{{ route('frontend.home') }}">HOME</a></li>
            <li><a href="{{ route('frontend.tentang') }}">TENTANG</a></li>
            <li><a href="{{ route('frontend.berita') }}">BERITA</a></li>
            <li><a href="{{ route('frontend.galeri') }}">GALERI</a></li>
            <li><a href="{{ route('frontend.kontak') }}">KONTAK</a></li>
        </ul>
    </nav>

    <div class="hero-section">
        <h1 class="judul-hero">
            @yield('judul_hero')
        </h1>
    </div>
</header>

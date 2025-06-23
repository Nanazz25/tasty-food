<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tasty Food')</title>
    <link rel="icon" href="{{ asset('aset/food.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    @stack('styles')
</head>

<body>

    {{-- Navbar --}}
    @include('frontend.layouts.navbar')

    {{-- Konten Utama --}}
    @yield('content')

    {{-- Footer --}}
    @include('frontend.layouts.footer')


    {{-- Scripts --}}
    @stack('scripts')

    <script>
        function toggleMenu(icon) {
            const menu = document.getElementById("navbar-menu");
            icon.classList.toggle("open");
            menu.classList.toggle("show");

            // Untuk overlay background hitam
            document.body.classList.toggle("menu-open");

            // Mencegah scroll saat menu terbuka
            if (document.body.classList.contains("menu-open")) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }
    </script>

</body>

</html>

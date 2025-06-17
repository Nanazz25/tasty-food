<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tasty Food')</title>
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
</body>
</html>

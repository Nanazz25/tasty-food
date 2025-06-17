<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use App\Models\Berita;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
        $tentang = Tentang::latest()->first();
        $berita = Berita::latest()->take(3)->get();
        $galeri = Galeri::latest()->take(6)->get();

        return view('frontend.home', compact('tentang', 'berita', 'galeri'));
    }
}

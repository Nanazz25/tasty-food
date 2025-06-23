<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kontak;


class DashboardController extends Controller
{

    public function index()
    {
        $jumlahBerita = Berita::count();
        $jumlahGaleri = Galeri::count();
        $jumlahPesan = Kontak::count();
        $pesanTerakhir = Kontak::latest()->take(5)->get();

        return view('dashboard', compact('jumlahBerita', 'jumlahGaleri', 'jumlahPesan', 'pesanTerakhir'));
    }

}

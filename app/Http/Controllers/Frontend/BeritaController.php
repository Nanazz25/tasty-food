<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $beritaUtama = Berita::latest()->first();
        $beritaLainnya = Berita::where('id', '!=', $beritaUtama->id)->latest()->get();

        return view('frontend.berita', compact('beritaUtama', 'beritaLainnya'));
    }


    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('frontend.detail-berita', compact('berita'));
    }

}


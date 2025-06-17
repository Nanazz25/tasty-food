<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeriPaginate = Galeri::latest()->paginate(12); // bisa dipakai kalau kamu pakai pagination biasa
        $galeriAll = Galeri::latest()->get(); // ini untuk grid + carousel + loadmore

        return view('frontend.galeri', [
            'galeri' => $galeriPaginate,
            'galeriAll' => $galeriAll
        ]);
    }


}


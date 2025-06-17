<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tentang;

class TentangController extends Controller
{
    public function index()
    {
        $tastyFood = Tentang::find(1);
        $visi = Tentang::find(2);
        $misi = Tentang::find(3);

        return view('frontend.tentang', compact('tastyFood', 'visi', 'misi'));
    }
}

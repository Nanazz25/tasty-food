<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class KontakController extends Controller
{
    public function index()
    {
        return view('frontend.kontak');
    }
}


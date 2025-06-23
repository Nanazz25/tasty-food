<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\KontakMasukMail;

class KontakController extends Controller
{
    public function index()
    {
        if (!allowedRoles('akses_kontak')) {
            return redirect('/')->with('error', 'Kamu tidak punya akses ke Kontak!');
        }

        $kontak = Kontak::latest()->paginate(20); // pagination biar ringan
        return view('kontak.index', compact('kontak'));
    }

    public function show(Kontak $kontak)
    {
        return view('kontak.show', compact('kontak'));
    }

    public function create()
    {
        return view('kontak.create');
    }


    public function store(Request $request)
    {
        // Validasi input dari form kontak
        $request->validate([
            'subject' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        // Simpan ke database
        $kontak = Kontak::create([
            'subject' => $request->subject,
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        // Kirim email ke Gmail kamu
        Mail::to('adikmedong@gmail.com')->send(new KontakMasukMail($kontak));

        // Kembalikan response ke JavaScript (untuk SweetAlert)
        return response()->json(['message' => 'Pesan berhasil dikirim']);
    }


    public function destroy(Kontak $kontak)
    {
        $kontak->delete();
        return redirect()->route('kontak.index')->with('success', 'Pesan berhasil dihapus.');
    }
}

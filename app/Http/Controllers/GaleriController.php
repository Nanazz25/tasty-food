<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        if (!allowedRoles('akses_galeri')) {
            return redirect('/')->with('error', 'Kamu tidak punya akses ke Berita!');
        }

        $galeri = Galeri::latest()->get();
        return view('galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gambar' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $destination = public_path('galeri_images');

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $file->move($destination, $filename);
        Galeri::create([
            'nama_gambar' => $request->nama_gambar,
            'gambar' => 'galeri_images/' . $filename,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'nama_gambar' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($galeri->gambar && file_exists(public_path($galeri->gambar))) {
                unlink(public_path($galeri->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('galeri_images'), $filename);
            $galeri->update(['gambar' => 'galeri_images/' . $filename]);
        }

        return redirect()->route('galeri.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar && file_exists(public_path($galeri->gambar))) {
            unlink(public_path($galeri->gambar));
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Gambar berhasil dihapus.');
    }
}

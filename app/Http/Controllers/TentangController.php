<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        if (!allowedRoles('akses_tentang')) {
            return redirect('/')->with('error', 'Kamu tidak punya akses ke Tentang!');
        }

        $tentang = Tentang::latest()->get();
        return view('tentang.index', compact('tentang'));
    }

    public function create()
    {
        return view('tentang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'gambar_kiri' => 'nullable|image|mimes:jpg,jpeg,png|max:10048',
            'gambar_kanan' => 'nullable|image|mimes:jpg,jpeg,png|max:10048',
        ]);

        $data = $request->only('judul', 'isi');

        if ($request->hasFile('gambar_kiri')) {
            $file = $request->file('gambar_kiri');
            $filename = time() . '_kiri_' . $file->getClientOriginalName();
            $file->move(public_path('tentang_images'), $filename);
            $data['gambar_kiri'] = 'tentang_images/' . $filename;
        }

        if ($request->hasFile('gambar_kanan')) {
            $file = $request->file('gambar_kanan');
            $filename = time() . '_kanan_' . $file->getClientOriginalName();
            $file->move(public_path('tentang_images'), $filename);
            $data['gambar_kanan'] = 'tentang_images/' . $filename;
        }

        Tentang::create($data);

        return redirect()->route('tentang.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Tentang $tentang)
    {
        return view('tentang.edit', compact('tentang'));
    }

    public function update(Request $request, Tentang $tentang)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'gambar_kiri' => 'nullable|image|mimes:jpg,jpeg,png|max:10048',
            'gambar_kanan' => 'nullable|image|mimes:jpg,jpeg,png|max:10048',
        ]);

        $data = $request->only('judul', 'isi');

        if ($request->hasFile('gambar_kiri')) {
            if ($tentang->gambar_kiri && file_exists(public_path($tentang->gambar_kiri))) {
                unlink(public_path($tentang->gambar_kiri));
            }

            $file = $request->file('gambar_kiri');
            $filename = time() . '_kiri_' . $file->getClientOriginalName();
            $file->move(public_path('tentang_images'), $filename);
            $data['gambar_kiri'] = 'tentang_images/' . $filename;
        }

        if ($request->hasFile('gambar_kanan')) {
            if ($tentang->gambar_kanan && file_exists(public_path($tentang->gambar_kanan))) {
                unlink(public_path($tentang->gambar_kanan));
            }

            $file = $request->file('gambar_kanan');
            $filename = time() . '_kanan_' . $file->getClientOriginalName();
            $file->move(public_path('tentang_images'), $filename);
            $data['gambar_kanan'] = 'tentang_images/' . $filename;
        }

        $tentang->update($data);

        return redirect()->route('tentang.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Tentang $tentang)
    {
        if ($tentang->gambar_kiri && file_exists(public_path($tentang->gambar_kiri))) {
            unlink(public_path($tentang->gambar_kiri));
        }

        if ($tentang->gambar_kanan && file_exists(public_path($tentang->gambar_kanan))) {
            unlink(public_path($tentang->gambar_kanan));
        }

        $tentang->delete();

        return redirect()->route('tentang.index')->with('success', 'Data berhasil dihapus.');
    }
}

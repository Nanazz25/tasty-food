<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
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
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('judul', 'isi');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('tentang_images'), $filename);
            $data['gambar'] = 'tentang_images/' . $filename;
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
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('judul', 'isi');

        if ($request->hasFile('gambar')) {
            if ($tentang->gambar && file_exists(public_path($tentang->gambar))) {
                unlink(public_path($tentang->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('tentang_images'), $filename);
            $data['gambar'] = 'tentang_images/' . $filename;
        }

        $tentang->update($data);

        return redirect()->route('tentang.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Tentang $tentang)
    {
        if ($tentang->gambar && file_exists(public_path($tentang->gambar))) {
            unlink(public_path($tentang->gambar));
        }

        $tentang->delete();

        return redirect()->route('tentang.index')->with('success', 'Data berhasil dihapus.');
    }
}

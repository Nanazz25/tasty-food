<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::latest()->get();
        return view('kontak.index', compact('kontak'));
    }

    public function create()
    {
        return view('kontak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'pesan' => 'required|string',
        ]);

        Kontak::create($request->all());
        return redirect()->route('kontak.index')->with('success', 'Pesan berhasil ditambahkan.');
    }

    public function edit(Kontak $kontak)
    {
        return view('kontak.edit', compact('kontak'));
    }

    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'pesan' => 'required|string',
        ]);

        $kontak->update($request->all());
        return redirect()->route('kontak.index')->with('success', 'Pesan berhasil diperbarui.');
    }

    public function destroy(Kontak $kontak)
    {
        $kontak->delete();
        return redirect()->route('kontak.index')->with('success', 'Pesan berhasil dihapus.');
    }
}

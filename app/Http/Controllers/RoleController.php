<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        \Log::info('Request masuk:', $request->all());

        $validated = $request->validate([
            'name' => 'required|unique:roles,name',
            'akses_galeri' => 'nullable|in:on',
            'akses_berita' => 'nullable|in:on',
            'akses_kontak' => 'nullable|in:on',
            'akses_tentang' => 'nullable|in:on',
        ]);

        $role = Role::create([
            'name' => $validated['name'],
            'akses_galeri' => $request->has('akses_galeri'),
            'akses_berita' => $request->has('akses_berita'),
            'akses_kontak' => $request->has('akses_kontak'),
            'akses_tentang' => $request->has('akses_tentang'),
        ]);

        \Log::info('Role disimpan:', $role->toArray());

        return redirect()->route('dashboard')->with('success', 'Role berhasil ditambahkan.');
    }

}

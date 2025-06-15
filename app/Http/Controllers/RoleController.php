<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        if (!allowedRoles('akses_roles')) {
            return redirect('/')->with('error', 'Kamu tidak punya akses ke Berita!');
        }

        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        \Log::info('Request masuk:', $request->all());

        $validated = $request->validate([
            'name' => 'required|unique:roles,name',
            'akses_roles' => 'nullable|in:on',
            'akses_users' => 'nullable|in:on',
            'akses_galeri' => 'nullable|in:on',
            'akses_berita' => 'nullable|in:on',
            'akses_kontak' => 'nullable|in:on',
            'akses_tentang' => 'nullable|in:on',
        ]);

        $role = Role::create([
            'name' => $validated['name'],
            'akses_roles' => $request->has('akses_roles'),
            'akses_users' => $request->has('akses_users'),
            'akses_galeri' => $request->has('akses_galeri'),
            'akses_berita' => $request->has('akses_berita'),
            'akses_kontak' => $request->has('akses_kontak'),
            'akses_tentang' => $request->has('akses_tentang'),
        ]);

        \Log::info('Role disimpan:', $role->toArray());

        return redirect()->route('roles.index')->with('success', 'Role berhasil ditambahkan.');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'akses_roles' => 'nullable|in:on',
            'akses_users' => 'nullable|in:on',
            'akses_galeri' => 'nullable|in:on',
            'akses_berita' => 'nullable|in:on',
            'akses_kontak' => 'nullable|in:on',
            'akses_tentang' => 'nullable|in:on',
        ]);

        $role->update([
            'name' => $validated['name'],
            'akses_roles' => $request->has('akses_roles'),
            'akses_users' => $request->has('akses_users'),
            'akses_galeri' => $request->has('akses_galeri'),
            'akses_berita' => $request->has('akses_berita'),
            'akses_kontak' => $request->has('akses_kontak'),
            'akses_tentang' => $request->has('akses_tentang'),
        ]);

        return redirect()->route('roles.index')->with('success', 'Role berhasil diupdate.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role berhasil dihapus.');
    }
}

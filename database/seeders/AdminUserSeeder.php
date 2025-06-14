<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $superadmin = Role::create([
            'name' => 'superadmin',
            'akses_roles' => true,
            'akses_users' => true,
            'akses_galeri' => true,
            'akses_berita' => true,
            'akses_kontak' => true,
            'akses_tentang' => true,
        ]);

        $admin = Role::create([
            'name' => 'admin',
            'akses_roles' => false,
            'akses_users' => false,
            'akses_galeri' => true,
            'akses_berita' => true,
            'akses_kontak' => false,
            'akses_tentang' => false,
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'password' => Hash::make('superadmin00'),
            'role_id' => $superadmin->id,
            'is_superadmin' => true,
        ]);

        User::create([
            'name' => 'Admin Biasa',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin01'),
            'role_id' => $admin->id,
            'is_superadmin' => false,
        ]);
    }
}

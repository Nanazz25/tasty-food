<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\KontakController;

Route::get('/', function () {
    return view('welcome');
});

// Authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    // Users CRUD
    Route::resource('users', UserController::class)->except(['show']);

    // Berita CRUD
    Route::resource('berita', BeritaController::class)->parameters([
        'berita' => 'berita'
    ])->except(['show']);

    // Galeri CRUD
    Route::resource('galeri', GaleriController::class)->except(['show']);

    // Tentang CRUD
    Route::resource('tentang', TentangController::class)->except(['show']);

    // Kontak CRUD
    Route::resource('kontak', KontakController::class)->except('show');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Roles (Super Admin only)
Route::middleware(['web', 'auth', App\Http\Middleware\IsSuperAdmin::class])->group(function () {
    Route::resource('roles', RoleController::class)->except(['show']);
});

require __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TentangController as FrontendTentang;
use App\Http\Controllers\Frontend\BeritaController as FrontendBerita;
use App\Http\Controllers\Frontend\GaleriController as FrontendGaleri;
use App\Http\Controllers\Frontend\KontakController as FrontendKontak;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::get('/tentang', [FrontendTentang::class, 'index'])->name('frontend.tentang');
Route::get('/berita', [FrontendBerita::class, 'index'])->name('frontend.berita');
Route::get('/berita/{id}', [FrontendBerita::class, 'show'])->name('berita.show');
Route::get('/galeri', [FrontendGaleri::class, 'index'])->name('frontend.galeri');
Route::get('/kontak', [FrontendKontak::class, 'index'])->name('frontend.kontak');

// Authenticated users
Route::middleware(['auth'])->prefix('admin')->group(function () {
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
    Route::get('kontak/{kontak}', [KontakController::class, 'show'])->name('kontak.show');

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

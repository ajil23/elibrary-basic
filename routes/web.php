<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $buku = Buku::count();
        $kategori = Kategori::count();
        $peminjaman = Peminjaman::count();
        return view('admin.index', compact('buku', 'kategori', 'peminjaman'));
    })->name('dashboard');

    // Buku
    Route::get('/tampil-buku', [BukuController::class, 'index'])->name('buku.tampil');
    Route::get('/tambah-buku', [BukuController::class, 'add'])->name('buku.tambah');
    Route::post('/store-buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/edit-buku/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::post('/update-buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/hapus-buku/{id}', [BukuController::class, 'delete'])->name('buku.hapus');
    Route::get('/buku/{id}', [BukuController::class, 'pdf'])->name('buku.pdf');

    // Kategori
    Route::get('/tampil-kategori', [KategoriController::class, 'index'])->name('kategori.tampil');
    Route::get('/tambah-kategori', [KategoriController::class, 'add'])->name('kategori.tambah');
    Route::post('/store-kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/edit-kategori/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/update-kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/hapus-kategori/{id}', [KategoriController::class, 'delete'])->name('kategori.hapus');

    // Peminjaman
    Route::get('/tampil-peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.tampil');
    Route::get('/tambah-peminjaman', [PeminjamanController::class, 'add'])->name('peminjaman.tambah');
    Route::post('/store-peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/edit-peminjaman/{id}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
    Route::post('/update-peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
    Route::get('/hapus-peminjaman/{id}', [PeminjamanController::class, 'delete'])->name('peminjaman.hapus');
    Route::get('/export-peminjaman', [PeminjamanController::class, 'export'])->name('peminjaman.export');
});

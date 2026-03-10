<?php

use App\Http\Controllers\Buku;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Frontend
Route::get('/', [BukuController::class, 'beranda']);

Route::get('/buku', [BukuController::class, 'indexBuku']);

Route::get('/buku/{buku:slug}', [BukuController::class, 'showBuku']);

Route::get('/informasi', function () {
    return view('informasi', [
        "title" => 'Informasi'
    ]);
});

Route::get('/kategori', [KategoriController::class, 'indexKategori']);

// Backend
// Admin & Pengguna
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);


Route::get('/all-kategori', [KategoriController::class, 'index']);

Route::get('/all-pengguna', [AdminController::class, 'indexPengguna'])->name('admin.data-pengguna.index');

Route::post('/logout', [LoginController::class, 'logout']);

// Admin
Route::get('/admin', [AdminController::class, 'index']);

// Pengguna
Route::get('/pengguna', [User::class, 'indexPengguna']);

Route::get('/pengguna/data-resensi', [User::class, 'indexBukuPengguna'])->name('pengguna.data-resensi.index');
Route::get('/pengguna/data-resensi/tambah', [BukuController::class, 'createBukuPengguna']);
Route::post('/pengguna/data-resensi/store', [BukuController::class, 'storeBukuPengguna'])->name('pengguna.data-resensi.store');
Route::get('/pengguna/data-resensi/{slug}/ubah', [BukuController::class, 'editBukuPengguna'])->name('pengguna.data-resensi.edit');
Route::post('/pengguna/data-resensi/{slug}/update', [BukuController::class, 'updateBukuPengguna'])->name('pengguna.data-resensi.update');
Route::delete('/pengguna/data-resensi/{slug}', [BukuController::class, 'destroyBukuPengguna'])->name('pengguna.data-resensi.destroy');

// pencarian di dashboard admin all-resensi
Route::get('/all-resensi', [BukuController::class, 'index'])->name('admin.data-resensi.index');

// pencarian di dashboard admin all-kategori
Route::get('/all-kategori', [KategoriController::class, 'index'])->name('admin.data-kategori.index');


// pencarian di buku utama
Route::get('/buku', [BukuController::class, 'indexBuku'])->name('buku');

// form ubah all-resensi
// Route::get('/admin/data-resensi/{{ $bk->slug }}/ubah')

// Route::get('/kategori/{kategori:nama}', [KategoriController::class, 'indexKategori']);

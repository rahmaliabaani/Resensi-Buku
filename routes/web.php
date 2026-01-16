<?php

use App\Http\Controllers\Buku;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;


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

Route::get('/', [BukuController::class, 'beranda']);

Route::get('/buku', [BukuController::class, 'indexBuku']);

Route::get('/buku/{buku:slug}', [BukuController::class, 'showBuku']);

Route::get('/informasi', function () {
    return view('informasi', [
        "title" => 'Informasi'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/kategori', [KategoriController::class, 'indexKategori']);

Route::get('/admin', [AdminController::class, 'index']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/all-resensi', [BukuController::class, 'index']);

// pencarian di dashboard admin all-resensi
Route::get('/all-resensi', [BukuController::class, 'index'])->name('admin.data-resensi.index');

// pencarian di buku utama
Route::get('/buku', [BukuController::class, 'indexBuku'])->name('buku');

// form ubah all-resensi
// Route::get('/admin/data-resensi/{{ $bk->slug }}/ubah')

// Route::get('/kategori/{kategori:nama}', [KategoriController::class, 'indexKategori']);

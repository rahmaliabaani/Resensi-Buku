<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title' => 'Dashboard Admin',
            "totalBuku" => Buku::count(),
            "totalKategori" => Kategori::count(),
            "totalPengguna" => User::where('is_admin', '0')->get()->count(),
        ]);
    }
}

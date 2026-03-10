<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexPengguna()
    {
        return view('pengguna.index', [
            'title' => 'Dashboard Pengguna',
            'totalBuku' => Buku::where('user_id', auth()->id())->count(),
            'totalKategori' => Kategori::count(),
        ]);
    }

    public function indexBukuPengguna()
    {            
        return view('pengguna.data-resensi.index', [
            'title' => 'Data Resensi Pengguna',
            'bukuPengguna' => Buku::where('user_id', auth()->id())->latest('bukus.created_at')->with('kategori')->with('user')->filter()->paginate(20)->withQueryString(),
            'namaPengguna' => auth()->user()->name,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

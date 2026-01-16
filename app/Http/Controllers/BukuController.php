<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function beranda()
    {
        return view('beranda', [
            "title" => "Beranda",
            "buku" => Buku::latest('bukus.waktu_post')->paginate(3)->withQueryString()
        ]);
    }

    public function indexBuku()
    {
        return view('buku', [
            "title" => "Buku",
            "buku" => Buku::latest('bukus.waktu_post')->filter()->paginate(12)->withQueryString()
        ]);
    }

    public function showBuku(Buku $buku)
    {
        return view('detailb', [
            "title" => "Detail Buku",
            "buku" => $buku
        ]);
    }

    public function index()
    {
        return view('admin.data-resensi.index', [
            "title" => "Data Resensi",
            "buku" => Buku::latest('bukus.waktu_post')->with('kategori')->with('user')->filter()->paginate(20)->withQueryString()
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
    public function store(StoreBukuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuRequest $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}

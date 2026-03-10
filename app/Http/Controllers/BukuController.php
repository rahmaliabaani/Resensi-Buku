<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function beranda()
    {
        return view('beranda', [
            "title" => "Beranda",
            "buku" => Buku::latest('bukus.created_at')->paginate(3)->withQueryString()
        ]);
    }

    public function indexBuku()
    {
        return view('buku', [
            "title" => "Buku",
            "buku" => Buku::latest('bukus.created_at')->filter()->paginate(12)->withQueryString()
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
            "buku" => Buku::latest('bukus.created_at')->with('kategori')->with('user')->filter()->paginate(20)->withQueryString(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createBukuPengguna()
    {
        return view('pengguna.data-resensi.tambah', [
            "title" => "Data Resensi Pengguna",
            "kategori" => Kategori::select('id', 'nama')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeBukuPengguna(Request $request)
    {  

        $request->validate([
            'judul' => 'required|min:5',
            'kategori_id' => 'required',
            'penerbit' => 'required|min:5',
            'pengarang' => 'required|min:5',
            'tahun_terbit' => 'required|numeric',
            'tebal_buku' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'isi' => 'required',
        ]);

        $data = $request->except('gambar');
        // upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar-buku', 'public');
        }
        // generate slug unik
        $slug = Str::slug($request->judul);
        $originalSlug = $slug;
        $count = 1;

        while (Buku::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        // insert data ketabel buku
        Buku::create($data);
        return redirect()->route('pengguna.data-resensi.index')->with('success', 'Data Berhasil ditambahkan!');
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
    public function editBukuPengguna($slug)
    {
        return view('pengguna.data-resensi.edit', [
            "title" => "Data Resensi Pengguna",
            "buku" => Buku::where('slug', $slug)->firstOrFail(),
            "kategori" => Kategori::select('id', 'nama')->get()
        ]);    
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateBukuPengguna(Request $request, $slug)
    {
        $buku = Buku::where('slug', $slug)->firstOrFail();
        
        $request->validate([
            'judul' => 'required|min:5',
            'kategori_id' => 'required',
            'penerbit' => 'required|min:5',
            'pengarang' => 'required|min:5',
            'tahun_terbit' => 'required|numeric',
            'tebal_buku' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'isi' => 'required',
        ]);

        $data = $request->except('gambar');
        
        // upload gambar baru
        if ($request->hasFile('gambar')) {
            // upload gambar lama kalau ada
            if ($buku->gambar && Storage::disk('public')->exists($buku->gambar)) {
                Storage::disk('public')->delete($buku->gambar);
            }
            // simpan gambar baru
            $data['gambar'] = $request->file('gambar')->store('gambar-buku', 'public');
        }

        $buku->update($data);

        return redirect()->route('pengguna.data-resensi.index')->with('success', 'Data Berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyBukuPengguna($slug)
    {
        $buku = Buku::where('slug', $slug)->firstOrFail();
        if ($buku->gambar && Storage::disk('public')->exists($buku->gambar)) {
            Storage::disk('public')->delete($buku->gambar);
        }
        $buku->delete();

        return redirect()->route('pengguna.data-resensi.index')->with('success', 'Data Berhasil dihapus!');
    }
}

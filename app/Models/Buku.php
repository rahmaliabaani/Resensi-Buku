<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    // use HasFactory;
    protected $fillable = [
        'judul',
        'kategori_id',
        'user_id',
        'slug',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'tebal_buku',
        'isi'
    ];

    public function scopeFilter(Builder $query) : void
    {
        // Pencarian: ketika inputan cari kosong maka pencarian berhenti, tapi jika ada inputan maka menjalankan perintah function yaitu ambil querynya dan ambil nilai input carinya
        $query->where('judul', 'like', '%' . request('cari') . '%')
                ->orWhere('pengarang', 'like', '%' . request('cari') . '%');
    }
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // untuk penggunaan slug di resources
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}

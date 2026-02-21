<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create(['id' => 1, 'nama' => 'Fiksi', 'slug' => 'fiksi', 'penjelasan' => 'cerita berdasarkan imajinasi']);
        Kategori::create(['id' => 2, 'nama' => 'Non Fiksi', 'slug' => 'non-fiksi', 'penjelasan' => 'cerita berdasarkan kisah nyata']);
    }
}

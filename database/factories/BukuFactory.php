<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'id' => 1, 
            'kategori_id' => 1, 
            'user_id' => 1, 
            'judul' => 'As Long As The Lemon Trees Grow', 
            'slug' => 'as-long-as-the-lemon-trees-grow' . '-' . $this->faker->unique()->numberBetween(100, 999), 
            'pengarang' => 'Zoulfa Katouh', 
            'penerbit' => 'Mizan Pustaka', 
            'tahun_terbit' => '2022', 
            'tebal_buku' => '512', 
            'isi' => 'Salama seorang mahasiswa farmasi, asal negeri Suriah. Kehilangan seluruh keluarganya dan menyisakan seorang kaka ipar perempuan yang tengah mengandung 7 bulan.
            Yang sedang memikirkan apakah dia akan meninggal kota Homs, Suriah. atau tetap bertahan dikesulitan situasi yang penuh dengan pembunuhan.'
        ];
    }
}

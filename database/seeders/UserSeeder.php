<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['id' => 1, 'name' => 'Rahma', 'email' => 'rahma@gmail.com', 'password' => '12345', 'role' => 'admin']);
        User::create(['id' => 2, 'name' => 'Bunga', 'email' => 'bunga@gmail.com', 'password' => '12345', 'role' => 'pengguna']);
    }
}

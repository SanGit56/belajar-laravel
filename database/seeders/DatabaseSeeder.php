<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pertanyaan;
use App\Models\Kategori;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'sayasan',
            'username' => 'san',
            'email' => 'san@yahoo.com',
            'password' => bcrypt('paswort')
        ]);

        User::factory(2)->create();

        Kategori::create([
            'nama' => 'produk'
        ]);

        Kategori::create([
            'nama' => 'layanan pelanggan'
        ]);

        Pertanyaan::factory(12)->create();
    }
}
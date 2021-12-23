<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Barang::factory(10)->create();
        Kategori::factory(5)->create();
        User::create([
            'name' => 'cek1',
            'username' => 'cek1',
            'role' => 'user',
            'email' => 'cek1@gamil.com',
            'password' => 'cek1'
        ]);
    }
}

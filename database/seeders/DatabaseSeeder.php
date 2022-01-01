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
        Barang::factory(12)->create();
        Kategori::factory(5)->create();
        User::create([
            'username' => 'user',
            'role' => 'user',
            'password' => '12341234'
        ]);

        User::create([
            'username' => 'admin',
            'role' => 'admin',
            'password' => '12341234'
        ]);
    }
}

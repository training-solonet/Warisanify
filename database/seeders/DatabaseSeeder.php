<?php

namespace Database\Seeders;

use App\Models\produk;
use App\Models\kategori;
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
        // \App\Models\User::factory(10)->create();

        produk::create([
            'produk' => 'wayang kulit',
            'foto' => 'laravel.png',
            'harga' => 3000000,
            'detailProduk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, odit.',
            'id_kategori' => 1
        ]);

        produk::create([
            'produk' => 'reog',
            'foto' => 'codeignater.png',
            'harga' => 2000000,
            'detailProduk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, odit.',
            'id_kategori' => 2
        ]);

        produk::create([
            'produk' => 'selendang',
            'foto' => 'php.png',
            'harga' => 5000000,
            'detailProduk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, odit.',
            'id_kategori' => 2
        ]);

        kategori::create([
            'nama_kategori' => 'wayang'
        ]);

        kategori::create([
            'nama_kategori' => 'aksesoris'
        ]);
    }
}

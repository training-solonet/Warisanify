<?php

namespace Database\Seeders;

use App\Models\produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        produk::create([
            'produk' => 'sinzhui',
            'foto' => 'foto 1',
            'harga' => 2000000,
            'detailProduk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, odit.',
            'id_kategori' => 1
        ]);

        produk::create([
            'produk' => 'lifeboy',
            'foto' => 'foto 2',
            'harga' => 20000,
            'detailProduk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, odit.',
            'id_kategori' => 1
        ]);

        produk::create([
            'produk' => 'detol',
            'harga' => 30000,
            'detailProduk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, odit.',
            'foto' => 'foto 3',
            'id_kategori' => 1
        ]);
    }
}

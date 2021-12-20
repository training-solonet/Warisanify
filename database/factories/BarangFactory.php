<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'namaBarang' => $this->faker->sentence(mt_rand(1, 4)),
            'harga' => mt_rand(1, 4) . "00.000",
            'gambar' => $this->faker->sentence(mt_rand(1, 3)),
            'detailProduk' => $this->faker->sentence(mt_rand(4, 10)),
            'idKategori' => mt_rand(1, 4)
        ];
    }
}

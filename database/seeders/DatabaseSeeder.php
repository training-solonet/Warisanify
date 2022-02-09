<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

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
        Category::factory(5)->create();
        Product::factory(10)->create();

        User::create([
            "name" => "user",
            "email" => "user@test.test",
            "password" => bcrypt(12341234),
        ]);

        User::create([
            "name" => "admin",
            "email" => "admin@test.test",
            "password" => bcrypt(12341234),
            "role" => "admin",
        ]);
    }
}

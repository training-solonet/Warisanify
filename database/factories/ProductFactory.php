<?php

namespace Database\Factories;
// use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title);
        return [
            'name' => $title,
            'slug' => $slug,
            'description' => $this->faker->text(200),
            'short_desc' => $this->faker->text(200),
            'regular_price' => $this->faker->numberBetween(200000, 500000),
            'width' => $this->faker->numberBetween(1, 100),
            'height' => $this->faker->numberBetween(1, 100),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(100, 200),
            // 'image' => 'warisan_' . $this->faker->unique()->numberBetween(1, 2) . '.jpg',
            'image' => 'warisan_' . mt_rand(1, 2) . '.png',
            'category_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}

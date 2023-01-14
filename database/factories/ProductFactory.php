<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->ean13(),
            'name' => fake()->name(),
            'price' => fake()->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'stock' => fake()->numberBetween($min = 100, $max = 9000),
            'description' => fake()->text(),
            'picture' => fake()->imageUrl(640, 480, 'cats', true, 'Faker', true),
            'state' => fake()->numberBetween($min = 1, $max = 2),
            'categories_id' => fake()->numberBetween($min = 1, $max = 50),
            'discounts_id' => fake()->numberBetween($min = 1, $max = 10),
        ];
    }
}

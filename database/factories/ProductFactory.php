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
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        return [
            'code' => fake()->ean13(),
            'name' => fake()->sentence($nbWords = 2, $variableNbWords = true),
            'price' => fake()->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'stock' => fake()->numberBetween($min = 100, $max = 9000),
            'description' => fake()->text(),
            'picture' => $faker->imageUrl($width = 400, $height = 400),
            'state' => fake()->numberBetween($min = 1, $max = 2),
            'categories_id' => fake()->numberBetween($min = 1, $max = 50),
            'discounts_id' => fake()->numberBetween($min = 1, $max = 10),
        ];
    }
}

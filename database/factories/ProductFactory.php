<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use App\Models\Category;

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
            'name' => fake()->sentence($nbWords = 1, $variableNbWords = true),
            'description' => fake()->text(),
            'brand_id' => fake()->numberBetween($min = 1, $max = 6),
            'category_id' => fake()->numberBetween($min = 1, $max = 6),
            'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 800),
            'picture' => $faker->imageUrl($width = 400, $height = 400),
        ];
    }
}

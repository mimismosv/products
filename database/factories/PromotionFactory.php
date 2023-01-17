<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PromotionFactory extends Factory
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
        $price = fake()->randomFloat($nbMaxDecimals = 2, $min = 25, $max = 251);
        $discount = $price - ($price * (fake()->numberBetween($min = 5, $max = 40)/100));
        return [
            'product_id' => fake()->numberBetween($min = 1, $max = 50),
            'name' => fake()->sentence($nbWords = 1, $variableNbWords = true),
            'price' => $price,
            'picture' => $faker->imageUrl($width = 400, $height = 400),            
            'promotion_percentage' => $discount 
        ];
    }
}
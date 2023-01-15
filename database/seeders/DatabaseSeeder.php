<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    //    \App\Models\Category::factory(50)->create();
    //    \App\Models\Discount::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    $brands = [
        'Samsung', 'LG', 'Sony', 'Panasonic', 'Philips', 'Sharp'
    ];

    foreach ($brands as $brand) {
        \App\Models\Brand::create([
            'name' => $brand
        ]);
        }

    $categories = [
        'Television', 'Refrigerator', 'Air Conditioner', 'Washing Machine', 'Microwave', 'Dish Washer'
    ];

    foreach ($categories as $category) {
        \App\Models\Category::create([
            'name' => $category
    ]);
    }        

    \App\Models\Product::factory(80)->create();
    \App\Models\Promotion::factory(10)->create();

    }
}

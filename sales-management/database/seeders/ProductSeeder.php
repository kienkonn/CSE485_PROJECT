<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index)    {
            Product::create([
                'name' => $faker->words(3, true),
                'description' => $faker->sentence(),
                'price' => $faker->randomFloat(2, 10, 9999),
                'quantity' => $faker->numberBetween(1, 500),
            ]);
         }
    }
}
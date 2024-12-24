<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            Customer::create([
                'name' => $faker->name,
                'address' => $faker->address, 
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
            ]);
        }
    }
}

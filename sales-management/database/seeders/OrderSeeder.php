<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $customerIds = \App\Models\Customer::pluck('id')->toArray(); // Lấy danh sách ID khách hàng

        foreach (range(1, 10) as $index) {
            Order::create([
                'customer_id' => $faker->randomElement($customerIds), // Lấy ngẫu nhiên customer_id từ bảng customers
                'order_date' => $faker->date(), // Ngày đặt hàng giả
                'status' => $faker->boolean(), // Trạng thái đơn hàng (true/false)
            ]);
        }
    }
}

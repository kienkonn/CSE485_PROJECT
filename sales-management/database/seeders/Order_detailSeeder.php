<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Order_detail;

class Order_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // Giả sử bạn đã có các order_id và product_id trong bảng orders và products
        $orderIds = \App\Models\Order::pluck('id')->toArray(); // Lấy danh sách ID đơn hàng
        $productIds = \App\Models\Product::pluck('id')->toArray(); // Lấy danh sách ID sản phẩm

        foreach (range(1, 10) as $index) {
            Order_detail::create([
                'order_id' => $faker->randomElement($orderIds), // Lấy ngẫu nhiên order_id từ bảng orders
                'product_id' => $faker->randomElement($productIds), // Lấy ngẫu nhiên product_id từ bảng products
                'quantity' => $faker->numberBetween(1, 10), // Số lượng sản phẩm trong đơn hàng
            ]);
        }
    }
}

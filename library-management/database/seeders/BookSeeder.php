<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'name' => '300 bài code thiếu nhi',
                'author' => 'Đình Kon',
                'category' => 'Công nghệ',
                'year' => 2024,
                'quantity' => 100,
            ],
            [
                'name' => 'Sách hướng dẫn nấu ăn',
                'author' => 'Văn Mass',
                'category' => 'Ẩm thực',
                'year' => 2020,
                'quantity' => 999,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Borrow;
class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $borrows = 
        [
            [
                'reader_id' => 1, 
                'book_id' => 1,   
                'borrow_date' => ('2024-01-01'),
                'return_date' => ('2024-01-15'),
                'status' => 0,

            ],
            [
                'reader_id' => 2, 
                'book_id' => 2,   
                'borrow_date' => ('2024-01-01'),
                'return_date' => ('2024-01-15'),
                'status' => 0,

            ],
        ];

        foreach($borrows as $borrow)
        {
            Borrow::create($borrow);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reader;
class ReederSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $readers = 
        [
            [
                'name' => 'Kiên Mạnh Lường',
                'birthday' => '2003/05/15',
                'address' => 'Điện Biên',
                'phone' => '0123456789',
            ],
            [

                'name' => 'Trần Văn Tráo',
                'birthday' => '1995/02/03',
                'address' => 'Hà Nội',
                'phone' => '0987654321',
            ],
        ];

        foreach($readers as $reader)
        {
            Reader::create($reader);
        }
    }
}

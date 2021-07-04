<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MotherTongue;


class MotherTonguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotherTongue::create([
            'mother_tongue' => 'English', 
            'mother_tongue_code' => 'ENG',
        ]);
    }
}

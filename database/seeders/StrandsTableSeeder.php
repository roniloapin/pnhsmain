<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Strand;


class StrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Strand::create([
            'strand_name' => 'Humanities and Social Sciences', 
            'strand_code' => 'HUMSS',
        ]);
    }
}

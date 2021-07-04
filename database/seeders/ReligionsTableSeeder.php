<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Religion;

class ReligionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Religion::create([
            'religion_name' => 'Born Again Christian', 
            'religion_code' => 'BAC',
        ]);
    }
}

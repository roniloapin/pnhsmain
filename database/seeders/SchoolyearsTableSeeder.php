<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schoolyear;


class SchoolyearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schoolyear::create([
            'schoolyear' => '2020-2021', 
            'schoolyear_status' => 'Active',
        ]);
    }
}

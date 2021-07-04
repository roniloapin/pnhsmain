<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LearnerType;


class LearnerTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LearnerType::create([
            'learner_type' => 'Transferee', 
            'learner_type_code' => 'TRS',
        ]);
    }
}

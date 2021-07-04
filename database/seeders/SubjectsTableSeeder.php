<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;


class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'subject' => 'English', 
            'subject_code' => 'ENG',
        ]);
    }
}

<?php

namespace Database\Seeders;
use App\Models\Room;

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'room' => 'Library.', 
            'room_number' => 'LIB',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'email' => 'admin@pnhs.com', 
            'name' => 'PNHS Admin',
            'role' => 'admin', 
            'password' => Hash::make('12345678') // password
        ]);
    }
}

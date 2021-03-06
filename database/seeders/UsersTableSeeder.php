<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'admin@pnhs.com', 
                'name' => 'PNHS Admin',
                'role' => 'admin', 
                'password' => '$2y$10$x7lGdBM5m2CoxL02cubOw.JIECgsJlC3.Z.3NmjidwqSUGyhHtnBq' // password
            ],
         ];

        foreach ($users as $user) 
        User::create($user);
    }
}

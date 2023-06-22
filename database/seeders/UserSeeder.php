<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'email' => 'suryamarcello@gmail.com',
                'name' => 'Feliciano Surya Marcello',
                'password' => bcrypt('ano123'),
                'role' => 'admin'
            ],
            [
                'email' => 'david@gmail.com',
                'name' => 'David Leo',
                'password' => bcrypt('david123')
            ],
            [
                'email' => 'kevin@gmail.com',
                'name' => 'Kevin Sanjaya',
                'password' => bcrypt('kevin123'),
            ],
            [
                'email' => 'eci@gmail.com',
                'name' => 'Eci',
                'password' => bcrypt('eci123'),
            ],
            [
                'email' => 'marcel@gmail.com',
                'name' => 'Marcel Halim',
                'password' => bcrypt('marcel123'),
            ],
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}

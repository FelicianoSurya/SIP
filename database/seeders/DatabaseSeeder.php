<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(EmployeeSeeder::class);
        // $this->call(PlaceSeeder::class);
        $this->call(IspSeeder::class);
        $this->call(TypeSeeder::class);
        // $this->call(PlaceIspSeeder::class);
    }
}

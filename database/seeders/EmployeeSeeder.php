<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = [
            [
                'name' => 'Felicano Surya Marcello',
                'phoneNumber' => '08373737373',
                'userId' => '1',
            ],
            [
                'name' => 'David Leo',
                'phoneNumber' => '083763833838',
                'userId' => '2',
            ],
            [
                'name' => 'Kevin Sanjaya',
                'phoneNumber' => '08373547478',
                'userId' => '3',
            ],
            [
                'name' => 'Eci',
                'phoneNumber' => '08376356356',
                'userId' => '4',
            ],
            [
                'name' => 'Marcel Halim',
                'phoneNumber' => '0877773838',
                'userId' => '5',
            ],
        ];

        foreach($employee as $key=> $value){
            Employee::create($value);
        }
    }
}

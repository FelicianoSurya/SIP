<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
            [
                'name' => 'Stadium'
            ],
            [
                'name' => 'Perusahaan'
            ],
            [
                'name' => 'Restoran'
            ],
            [
                'name' => 'Lapangan'
            ],
            [
                'name' => 'Sekolah'
            ],
        ];
        foreach($type as $key => $value){
            Type::create($value);
        }
    }
}

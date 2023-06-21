<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Isp;

class IspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $isp = [
            [
                'name' => 'netZAP',
            ],
            [
                'name' => 'Indihome',
            ],
            [
                'name' => 'Biznet',
            ],
            [
                'name' => 'oxygen',

            ],
            [
                'name' => 'MyRepublic',
            ],
        ];
        foreach($isp as $key => $value){
            Isp::create($value);
        }
    }
}

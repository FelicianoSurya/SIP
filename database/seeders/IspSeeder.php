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
                'phoneNumber' => '0837448844'
            ],
            [
                'name' => 'Indihome',
                'phoneNumber' => '0877373733'
            ],
            [
                'name' => 'Biznet',
                'phoneNumber' => '33939393939'
            ],
            [
                'name' => 'oxygen',
                'phoneNumber' => '0883335353'
            ],
            [
                'name' => 'MyRepublic',
                'phoneNumber' => '0838838383'
            ],
        ];
        foreach($isp as $key => $value){
            Isp::create($value);
        }
    }
}

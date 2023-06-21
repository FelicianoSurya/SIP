<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlaceIsp;

class PlaceIspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'placeId' => 1,
                'ispId' => 1,
                'phoneNumber' => '0837448844',
                'pic_name' => 'Tiara'
            ],
            [
                'placeId' => 1,
                'ispId' => 2,
                'phoneNumber' => '0877373733',
                'pic_name' => 'Kenny'
            ],
            [
                'placeId' => 1,
                'ispId' => 3,
                'phoneNumber' => '33939393939',
                'pic_name' => "Randy"
            ],
            [
                'placeId' => 1,
                'ispId' => 4,
                'phoneNumber' => '0883335353',
                'pic_name' => "Aiden"
            ],
            [
                'placeId' => 1,
                'ispId' => 5,
                'phoneNumber' => '0838838383',
                'pic_name' => "Eci"
            ],
            [
                'placeId' => 2,
                'ispId' => 1,
                'phoneNumber' => '0837448844',
                'pic_name' => 'Tiara'
            ],
            [
                'placeId' => 2,
                'ispId' => 2,
                'phoneNumber' => '0877373733',
                'pic_name' => 'Kenny'
            ],
            [
                'placeId' => 2,
                'ispId' => 3,
                'phoneNumber' => '083388383',
                'pic_name' => 'Kevin'
            ],
            [
                'placeId' => 2,
                'ispId' => 4,
                'phoneNumber' => '098383833',
                'pic_name' => 'Marcel'
            ],
            [
                'placeId' => 3,
                'ispId' => 1,
                'phoneNumber' => '0837448844',
                'pic_name' => 'Tiara'
            ],
            [
                'placeId' => 3,
                'ispId' => 2,
                'phoneNumber' => '0837448844',
                'pic_name' => 'Tiara'
            ],
            [
                'placeId' => 3,
                'ispId' => 3,
                'phoneNumber' => '0837448844',
                'pic_name' => 'Kevin'
            ],
            [
                'placeId' => 4,
                'ispId' => 1,
                'phoneNumber' => '0837448844',
                'pic_name' => 'Dann'
            ],
            [
                'placeId' => 4,
                'ispId' => 2,
                'phoneNumber' => '0837448844',
                'pic_name' => 'Lisa'
            ],
            [
                'placeId' => 5,
                'ispId' => 1,
                'phoneNumber' => '0837448844',
                'pic_name' => 'Tiara'
            ],
        ];
        foreach($data as $key=>$value){
            PlaceIsp::create($value);
        }
    }
}

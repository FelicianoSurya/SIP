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
            ],
            [
                'placeId' => 1,
                'ispId' => 2,
            ],
            [
                'placeId' => 1,
                'ispId' => 3,
            ],
            [
                'placeId' => 1,
                'ispId' => 4,
            ],
            [
                'placeId' => 1,
                'ispId' => 5,
            ],
            [
                'placeId' => 2,
                'ispId' => 1,
            ],
            [
                'placeId' => 2,
                'ispId' => 2,
            ],
            [
                'placeId' => 2,
                'ispId' => 3,
            ],
            [
                'placeId' => 2,
                'ispId' => 4,
            ],
            [
                'placeId' => 3,
                'ispId' => 1,
            ],
            [
                'placeId' => 3,
                'ispId' => 2,
            ],
            [
                'placeId' => 3,
                'ispId' => 3,
            ],
            [
                'placeId' => 4,
                'ispId' => 1,
            ],
            [
                'placeId' => 4,
                'ispId' => 2,
            ],
            [
                'placeId' => 5,
                'ispId' => 1,
            ],
        ];
        foreach($data as $key=>$value){
            PlaceIsp::create($value);
        }
    }
}

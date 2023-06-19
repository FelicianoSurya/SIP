<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Place;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $place = [
            [
                'name' => 'netZAP',
                'address' => 'Jl. Gunawarman Nomor 10',
                'phoneNumber' => '0823344555',
                'createdBy' => 1,
                'typeId' => 1
            ],
            [
                'name' => 'UMN',
                'address' => 'Jl. Serpong Raya No.5',
                'phoneNumber' => '083443435435',
                'createdBy' => 1,
                'typeId' => 2
            ],
            [
                'name' => 'Telkom',
                'address' => 'Jl. Senopati nomor 10',
                'phoneNumber' => '086546445546',
                'createdBy' => 1,
                'typeId' => 3
            ],
            [
                'name' => 'Biznet',
                'address' => 'Jl. BSD Raya Serpong no 5',
                'phoneNumber' => '08325442367',
                'createdBy' => 1,
                'typeId' => 2
            ],
            [
                'name' => 'Tirtayasa',
                'address' => 'Jl. Rajawali nomor 5',
                'phoneNumber' => '08235265654',
                'createdBy' => 2,
                'typeId' => 2
            ],
            [
                'name' => 'Kebayoran',
                'address' => 'Jl. Senayan no.5',
                'phoneNumber' => '083293238329',
                'createdBy' => 3,
                'typeId' => 1
            ],
            [
                'name' => 'Cisauk',
                'address' => 'Jl. Cisauk Raya nomor 5',
                'phoneNumber' => '083256346546',
                'createdBy' => 1,
                'typeId' => 4
            ],
            [
                'name' => 'GBK',
                'address' => 'Jl. Gelora karno nomor 20',
                'phoneNumber' => '08766575765',
                'createdBy' => 3,
                'typeId' => 1
            ],
            [
                'name' => 'Istora Raya',
                'address' => 'Jl. Istora no.5',
                'phoneNumber' => '082353654734',
                'createdBy' => 5,
                'typeId' => 2
            ],
            
            [
                'name' => 'Binus',
                'address' => 'Jl. Alam sutra raya',
                'phoneNumber' => '038384884',
                'createdBy' => 1,
                'typeId' => 5
            ],
            
            [
                'name' => 'UPH',
                'address' => 'Jl. uph no.5',
                'phoneNumber' => '083637373',
                'createdBy' => 5,
                'typeId' => 5
            ],
            
            [
                'name' => 'Prasetya Mulya',
                'address' => 'Jl. Prasmul no.5',
                'phoneNumber' => '082353654734',
                'createdBy' => 5,
                'typeId' => 5
            ],
            
            [
                'name' => 'ASUS Tower',
                'address' => 'Jl. Asus no.5',
                'phoneNumber' => '082353654734',
                'createdBy' => 5,
                'typeId' => 1
            ],
        ];  
        foreach($place as $key => $value){
            Place::create($value);
        }
    }
}

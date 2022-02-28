<?php

use App\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipsTableSeeder extends Seeder
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
                "name" => "Base",
                "price" => 2.99,
                "duration" => 24,
            ],
            [
                "name" => "Premium",
                "price" => 5.99,
                "duration" => 72,
            ],
            [
                "name" => "Elite",
                "price" => 9.99,
                "duration" => 144,
            ],
        ];

        foreach ($data as $sponsorship) {
            $new_sponsorship = new Sponsorship();

            $new_sponsorship->name = $sponsorship['name'];
            $new_sponsorship->price = $sponsorship['price'];
            $new_sponsorship->duration = $sponsorship['duration'];

            $new_sponsorship->save();
        }

    }
}

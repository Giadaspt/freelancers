<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){

            $new_message = new Message();

            $new_message->name_sender = $faker->firstName;
            $new_message->email_sender = $faker->email;
            $new_message->text = $faker->text;

            $new_message->save();

        }
    }
}

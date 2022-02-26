<?php

use App\Feedback;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){
            $new_feedback = new Feedback();

            $new_feedback->author_name = $faker->firstName;
            $new_feedback->text = $faker->text;
            $new_feedback->vote = random_int(1 , 5);

            $new_feedback->save();
        }
    }
}

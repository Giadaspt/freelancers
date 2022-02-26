<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){
            $new_review = new Review();
 
            $new_review->author_name = $faker->firstName;
            $new_review->text = $faker->text;
            $new_review->vote = random_int(1,5);
 
            $new_review->save();
 
        }
    }
}

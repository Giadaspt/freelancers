<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Review;

class UpdateReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = Review::all();

        foreach($reviews as $review){

            $data=['user_id'=>User::inRandomOrder()->first()->id];

            $review->update($data);
        }
    }
}

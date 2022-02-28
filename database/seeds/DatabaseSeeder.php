<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(SponsorshipsTableSeeder::class);
        $this->call(UpdateMessagesTableSeeder::class);
        $this->call(UpdateReviewsTableSeeder::class);
    }
}

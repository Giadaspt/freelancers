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
        $this->call(FeedbackTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(SponsorshipsTableSeeder::class);
    }
}

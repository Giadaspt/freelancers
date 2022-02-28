<?php

use App\Skill;
use App\User;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Problem solving',
            'Team work',
            'Comunication',
            'Creativity',
            'Listening',
            'Innovation',
            'Organized',
            'Time management'
        ];

        foreach ($data as $skill){

            $new_skill =  new Skill();

            $new_skill->name = $skill;
            $new_skill->slug = User::generateSlug($skill);

            
            $new_skill->save();

            
        }
    }
}

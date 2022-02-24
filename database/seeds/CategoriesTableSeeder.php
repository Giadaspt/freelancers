<?php

use App\Category;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Support specialist',
            'Computer programmer',
            'Graphic Designer',
            'Software Developer',
            'Web developer',
            'Systems analyst',
            'Network engineer',
            'User experience designer',
            'Database administrator',
            'Software engineer',
            'IT security specialist',
            'Data scientist',
        ];

        foreach($data as $category) {
            $new_category = new Category();

            $new_category->name = $category;
            $new_category->slug = User::generateSlug($category);

            $new_category->save();
        }
    }
}

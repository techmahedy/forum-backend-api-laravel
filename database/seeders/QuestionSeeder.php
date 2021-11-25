<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Question::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $faker = Faker::create();
        
        $a = 0;

        while ($a <= 10) {
            
            Question::create([
                'user_id'        =>  User::all()->random()->id,
                'category_id'    =>  Category::all()->random()->id,
                'question_title' => $faker->unique()->word,
                'question_slug'  => $faker->unique()->slug,
                'question_body'  => $faker->sentence
            ]);

            $a++;

        }
    }
}

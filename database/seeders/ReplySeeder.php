<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reply;
use App\Models\Question;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Reply::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $faker = Faker::create();
        
        $a = 0;

        while ($a <= 10) {
            
            Reply::create([
                'user_id'     =>  User::all()->random()->id,
                'question_id' =>  Question::all()->random()->id,
                'reply_text'  => $faker->sentence
            ]);

            $a++;

        }
    }
}
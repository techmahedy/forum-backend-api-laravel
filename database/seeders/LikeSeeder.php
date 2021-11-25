<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\User;
use App\Models\Reply;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Like::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $faker = Faker::create();
        
        $a = 0;

        while ($a <= 10) {
            
            Like::create([
                'user_id'     =>  User::all()->random()->id,
                'reply_id'    =>  Reply::all()->random()->id
            ]);

            $a++;

        }
    }
}

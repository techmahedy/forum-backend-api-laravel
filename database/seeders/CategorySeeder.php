<?php

namespace Database\Seeders;

use App\Models\Category;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create();
        
        $a = 0;

        while ($a <= 10) {
            
            Category::create([
                'category_name' => $faker->unique()->word,
                'category_slug' => $faker->unique()->slug
            ]);

            $a++;

        }

    }
}

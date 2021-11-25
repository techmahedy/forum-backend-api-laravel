<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\LikeSeeder;
use Database\Seeders\ReplySeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\QuestionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        
        $this->call([
            CategorySeeder::class,
            QuestionSeeder::class,
            ReplySeeder::class,
            LikeSeeder::class
        ]);
    }
}

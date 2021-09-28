<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index) {
            DB::table('tasks')->insert([
                'title' => $faker->word,
                'comment' => $faker->text,
                'start_time' => $faker->date,
                'finish_time' => $faker->date,
                'created_at' => $faker->date,
                'updated_at' => $faker->date,
                'user_id' => $faker->numerify(1),
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,400) as $index) {
            DB::table('notes')->insert([
                'user_id' => $faker->randomDigitNot(0),
                'title' => $faker->catchPhrase,
                'body' => $faker->realText($maxNbChars = 1000, $indexSize = 2),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}

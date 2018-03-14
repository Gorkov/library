<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');
        foreach (range(1,10) as $i) {
            DB::table('authors')->insert([
                'name' => $faker->firstNameMale,
                'surname' => $faker->lastName
            ]);
        }


        $genres = ['драма','боевик','детектив','фантастика','ужасы','история'];
        foreach (range(1,5) as $k => $i) {
            DB::table('genres')->insert([
                'name' => $genres[$k]
            ]);
        }

        $faker = Faker::create('ru_RU');
        foreach (range(1,20) as $i) {
            DB::table('books')->insert([
                'name' => $faker->jobTitle,
                'author_id' => $faker->numberBetween($min = 1, $max = 10),
                'genre_id' => $faker->numberBetween($min = 1, $max = 5),
                'rating' => $faker->numberBetween($min = 1, $max = 10)
            ]);
        }
    }
}

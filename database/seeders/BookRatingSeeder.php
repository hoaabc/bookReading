<?php

namespace Database\Seeders;

use App\Models\BookRating;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BookRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        //
        for($i = 1 ; $i < 100 ; $i++) {
            for($j = 1  ; $j < 200 ; $j++ ) {
                BookRating::create([
                   'book_id' => $i,
                    'user_id'=> $j,
                    'rating_point' => rand(1,5)
                ]);
            }
        }
    }
}

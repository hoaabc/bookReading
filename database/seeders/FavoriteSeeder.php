<?php

namespace Database\Seeders;

use App\Models\BookRating;
use App\Models\Favorite;
use Faker\Factory;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();
        //
        for($i = 1 ; $i < 100 ; $i++) {
            for($j = 1  ; $j < rand(1,199) ; $j++ ) {
                Favorite::create([
                    'book_id' => $i,
                    'user_id'=> $j,
                ]);
            }
        }
    }
}

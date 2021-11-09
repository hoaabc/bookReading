<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Favorite;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $url_array = [
            "http://hoabook.tk/pdf/b1.pdf" ,
            "http://hoabook.tk/pdf/b2.pdf" ,
            "http://hoabook.tk/pdf/b3.pdf" ,
            "http://hoabook.tk/pdf/b4.pdf" ,
            "http://hoabook.tk/pdf/b5.pdf" ,
            "http://hoabook.tk/pdf/b6.pdf" ,
        ];

        $status_array = [
            "finished",
            "on process",
            "unknown",
            "removed",
        ];

        $faker = Factory::create();
        //
        for($i = 1 ; $i < 100 ; $i++) {
            for($j = 1  ; $j < rand(1,100) ; $j++ ) {
                Episode::create([
                    'book_id' => $i,
                    'name' => "Episode ". $j ,
                    'content_url' => $url_array[rand(0,5)],
                    'status' => $status_array[rand(0,3)]
                ]);
            }
        }
    }
}

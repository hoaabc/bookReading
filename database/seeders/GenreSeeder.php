<?php

namespace Database\Seeders;

use App\Models\BookGenre;
use App\Models\Genre;
use Faker\Factory;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
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
       $data = [
            ["genre_name"=>"Literary Fiction", "description" => $faker->text(200),"genre_image" => $faker->imageUrl(100,100)],
            ["genre_name"=>"Mystery", "description" => $faker->text(200), "genre_image" => $faker->imageUrl(100,100)],
            ["genre_name"=>"Thriller", "description" => $faker->text(200) ,"genre_image" =>  $faker->imageUrl(100,100)],
            ["genre_name"=>"Horror", "description" => $faker->text(200), "genre_image" => $faker->imageUrl(100,100)],
            ["genre_name"=>"Historical", "description" => $faker->text(200) , "genre_image" => $faker->imageUrl(100,100)],
            ["genre_name"=>"Romance", "description" => $faker->text(200) , "genre_image" => $faker->imageUrl(100,100)],
            ["genre_name"=>"Western", "description" => $faker->text(200), "genre_image" => $faker->imageUrl(100,100)],
            ["genre_name"=>"Speculative Fiction", "description" => $faker->text(200) ,"genre_image" =>  $faker->imageUrl(100,100)],
            ["genre_name"=>"Science Fiction", "description" => $faker->text(200) , "genre_image" => $faker->imageUrl(100,100)],
            ["genre_name"=>"Fantasy", "description" => $faker->text(200), "genre_image" => $faker->imageUrl(100,100)],
            ["genre_name"=>"Dystopian", "description" => $faker->text(200), "genre_image" => $faker->imageUrl(100,100)],
            ["genre_name"=>"Magical Realism", "description" => $faker->text(200) , "genre_image" => $faker->imageUrl(100,100)],
            ["genre_name"=>"Realist Literature", "description" => $faker->text(200),"genre_image" =>  $faker->imageUrl(100,100)],
        ];
       Genre::insert($data);
    }
}

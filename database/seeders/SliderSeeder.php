<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;
use Faker\Factory;

class SliderSeeder extends Seeder
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
        Slider::insert([
            ['name' => $faker->name, 'slider_url' => $faker->imageUrl, 'created_by' => rand(10, 40)],
            ['name' => $faker->name, 'slider_url' => $faker->imageUrl, 'created_by' => rand(10, 40)],
            ['name' => $faker->name, 'slider_url' => $faker->imageUrl, 'created_by' => rand(10, 40)],
            ['name' => $faker->name, 'slider_url' => $faker->imageUrl, 'created_by' => rand(10, 40)],
            ['name' => $faker->name, 'slider_url' => $faker->imageUrl, 'created_by' => rand(10, 40)],
            ['name' => $faker->name, 'slider_url' => $faker->imageUrl, 'created_by' => rand(10, 40)],

        ]);
    }
}

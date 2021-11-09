<?php

namespace Database\Factories;

use App\Models\BookGenre;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookGenreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookGenre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'genre_id' => rand(1,13),
            'book_id' => rand(1,100)

        ];
    }
}

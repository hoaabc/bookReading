<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
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
            "0/10",
            "5/?",

        ];


        return [
            "name" => $this->faker->name,
            "book_image" => $this->faker->imageUrl(300,400, "books" ),
            "description" => $this->faker->text(500),
            "like_count" => rand(10, 100),
            "view_count" => rand(10, 1000),
            "content_text" => $this->faker->text(500),
            "content_url" => $url_array[rand(0, (count($url_array)  -1))],
            "chapter_count" => 1,
            "status" => $status_array[rand(0, (count($status_array) - 1))],
            "author_id" => rand(1, 20),
            "is_book_series" => 1,
            "created_by" => rand(1,20),
            "published_at" => $this->faker->dateTimeBetween('-50 years' , 'now'),

        ];
    }
}

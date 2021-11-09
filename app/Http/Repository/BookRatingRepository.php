<?php


namespace App\Http\Repository;


use App\Models\BookGenre;
use App\Models\BookRating;

class BookRatingRepository extends  BaseRepository
{
    public function __construct(BookRating  $bookRating)
    {
        parent::__construct($bookRating);
    }
}

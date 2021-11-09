<?php


namespace App\Http\Repository;


use App\Models\Author;
use App\Models\BookGenre;

class BookGenreRepository  extends  BaseRepository
{
    public function __construct(BookGenre  $bookGenre)
    {
        parent::__construct($bookGenre);
    }
}

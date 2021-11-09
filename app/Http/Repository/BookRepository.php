<?php


namespace App\Http\Repository;


use App\Models\Book;

class BookRepository extends  BaseRepository
{
    public function __construct(Book  $book)
    {
        parent::__construct($book);
    }


}

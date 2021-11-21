<?php


namespace App\Http\Repository;


use App\Models\Author;
use App\Models\Book;

class AuthorRepository  extends  BaseRepository
{
    public function __construct(Author  $author)
    {
        parent::__construct();
        $this->model = $author;
    }
}

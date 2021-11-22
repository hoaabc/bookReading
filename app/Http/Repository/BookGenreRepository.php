<?php


namespace App\Http\Repository;


use App\Models\Author;
use App\Models\BookGenre;
use App\Models\Episode;

class BookGenreRepository    extends  BaseRepository
{

    public function __construct(BookGenre  $model)
    {
        parent::__construct();
        $this->model = $model;
    }
}

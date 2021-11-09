<?php


namespace App\Http\Repository;


use App\Models\Genre;

class GenreRepository  extends  BaseRepository
{

    public function __construct(Genre  $genre)
    {
        parent::__construct($genre);
    }
}

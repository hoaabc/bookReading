<?php


namespace App\Http\Repository;


use App\Models\Genre;

class GenreRepository  extends  BaseRepository
{
    public function __construct(Genre $genre)
    {
        $this->model = $genre;
    }

    public  function  latest() {
        return $this->model->latest()->get();
    }
}

<?php


namespace App\Http\Repository;


use App\Models\Favorite;

class FavoriteRepository extends  BaseRepository
{
    public function __construct(Favorite  $favorite)
    {
        parent::__construct($favorite);
    }
}

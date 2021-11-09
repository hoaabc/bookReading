<?php


namespace App\Http\Repository;


use App\Models\Episode;

class EpisodeRepository extends  BaseRepository
{
    public function __construct(Episode  $episode)
    {
        parent::__construct($episode);
    }
}

<?php


namespace App\Http\Repository;


use App\Models\Author;
use App\Models\Slider;

class SliderRepository extends  BaseRepository
{
    public function __construct(Slider  $slider)
    {
        parent::__construct($slider);
    }
}

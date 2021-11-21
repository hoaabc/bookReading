<?php


namespace App\Http\Repository;


use App\Models\Author;
use App\Models\Slider;

class SliderRepository extends  BaseRepository
{
    public function __construct( Slider $slider)
    {
        parent::__construct();
        $this->model = $slider;
    }
//    public function getAll()
//    {
//        return $this->model->latest()->paginate(20);
//    }

}

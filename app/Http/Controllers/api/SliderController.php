<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\SliderRepository;

class SliderController extends Controller
{
    //
    public function __construct(SliderRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;

    }
}

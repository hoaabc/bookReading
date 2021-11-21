<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\FavoriteRepository;

class FavoriteController extends Controller
{
    //
    public function __construct(FavoriteRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;

    }
}

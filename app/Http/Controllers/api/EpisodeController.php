<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\EpisodeRepository;

class EpisodeController extends Controller
{
    //
    public function __construct(EpisodeRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;

    }
}

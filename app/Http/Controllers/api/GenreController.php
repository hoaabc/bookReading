<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\GenreRepository;

class GenreController extends Controller
{
    //
    public function __construct(GenreRepository $repository)
    {
        parent::__construct($repository);
    }
}

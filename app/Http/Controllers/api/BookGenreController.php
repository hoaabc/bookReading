<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\BookGenreRepository;

class BookGenreController extends Controller
{
    public function __construct(BookGenreRepository $repository)
    {
        parent::__construct($repository);
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\BookRatingRepository;

class BookRatingController extends Controller
{
    //
    public function __construct(BookRatingRepository $repository)
    {
        parent::__construct($repository);
    }
}

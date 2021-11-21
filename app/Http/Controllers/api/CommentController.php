<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\CommentRepository;

class CommentController extends Controller
{
    //
    public function __construct(CommentRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;

    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CrudInterface;
use App\Http\Repository\AuthorRepository;

class AuthorController  extends Controller
{
    public function __construct(AuthorRepository $repository)
    {
        $this->repository = $repository;
    }

}

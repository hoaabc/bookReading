<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\RoleRepository;

class RoleController extends Controller
{
    public function __construct(RoleRepository $repository)
    {
        parent::__construct($repository);
    }
}

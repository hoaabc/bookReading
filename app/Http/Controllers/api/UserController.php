<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\UserRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    public function __construct(UserRepository  $repository)
    {
        parent::__construct($repository);
    }

    public function store(Request $request)
    {

        $request['password'] = bcrypt($request['password']);
        return response(  $this->repository->store($request) , Response::HTTP_OK );
    }
//    public function show(User $user)
//    {
//
//        return response($this->repository->show($user) , Response::HTTP_OK ) ;
//
//    }

}

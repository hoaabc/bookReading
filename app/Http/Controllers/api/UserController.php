<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\FavoriteRepository;
use App\Http\Repository\UserRepository;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    protected $favoriteRepo;
    public function __construct(UserRepository  $repository , FavoriteRepository $favoriteRepo)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->favoriteRepo = $favoriteRepo;

    }

    public function store(Request $request)
    {

        $request['password'] = bcrypt($request['password']);
        return response(  $this->repository->store($request) , Response::HTTP_OK );
    }

    public function  favorites($id) {
        return response(  $this->favoriteRepo->favorites($id) , Response::HTTP_OK );

    }


}

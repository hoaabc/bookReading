<?php

namespace App\Http\Controllers;

use App\Http\Middleware\checkjwtToken;
use App\Http\Repository\BaseRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $repository;
    public function __construct()
    {
//        $this->middleware(checkjwtToken::class, ['except' => ['login']]);
    }

    public function index()
    {
        return response($this->repository->getAll(), Response::HTTP_OK );

    }

    public function store(Request $request)
    {
        return response(  $this->repository->store($request) , Response::HTTP_OK );
    }

    public function show( $id)
    {
        return response($this->repository->show($id) , Response::HTTP_OK ) ;
    }

    public function update(Request $request,  $id)
    {
        //
        return response(  $this->repository->update($request ,$id) , Response::HTTP_OK );


    }

    public function destroy( $id)
    {
        return response(  $this->repository->destroy($id) , Response::HTTP_OK );

    }

}

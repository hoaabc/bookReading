<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\UserRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository  $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }


    public function index()
    {
        return response($this->userRepository->getAll(), Response::HTTP_OK );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request['password'] = bcrypt($request['password']);
        return response(  $this->userRepository->store($request) , Response::HTTP_OK );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return response($this->userRepository->show($user) , Response::HTTP_OK ) ;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        return response(  $this->userRepository->update($request ,$user) , Response::HTTP_OK );


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return response(  $this->userRepository->destroy($user) , Response::HTTP_OK );

        //
    }
}

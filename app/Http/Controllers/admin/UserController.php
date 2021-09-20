<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        cookie()->queue(cookie()->forget('tests'));

        //
        return response(User::all() , \Illuminate\Http\Response::HTTP_OK , ['hello'=>"condsdacac" , 'a' => "con cac"]);
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

        return response(  User::create($request->all()) , \Illuminate\Http\Response::HTTP_OK , ['hello'=>"conacac" , 'a' => "ok"])->withCookie('test' , 'this is test' , 50000);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        cookie()->forget('tests');

        return response($user , \Illuminate\Http\Response::HTTP_ACCEPTED , ['hello'=>"conacac" , 'a' => "con cac"]) ;

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
        return response(  $user->update($request->all()) , \Illuminate\Http\Response::HTTP_OK , ['hello'=>"updsdasdasdasddsdated" , 'a' => "ok"]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return response(  $user->delete() , \Illuminate\Http\Response::HTTP_OK , ['hello'=>"updated" , 'a' => "ok"]);

        //
    }
}

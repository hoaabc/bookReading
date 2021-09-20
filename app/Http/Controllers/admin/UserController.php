<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\checkjwtToken;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
//        $this->middleware(checkjwtToken::class, ['except' => ['login']]);


    }

    /**
     * @var bool
     */
    public $loginAfterSignUp = true;

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'payload' => auth()->payload()
        ]);
    }

    public function index()
    {
        return response(User::paginate(10) , \Illuminate\Http\Response::HTTP_OK , ['hello'=>"condsdacac" , 'a' => "con cac"]);
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

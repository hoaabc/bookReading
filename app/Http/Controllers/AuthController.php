<?php

namespace App\Http\Controllers;

use App\Http\Repository\BaseRepository;
use App\Http\Repository\UserRepository;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(UserRepository $modelRepository)
    {
        parent::__construct($modelRepository);
    }

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
    public function getLoggedUser() {
        return auth()->user();
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

}

<?php

use App\Http\Controllers\api\BookController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('users', UserController::class);
Route::apiResource('books', BookController::class);

Route::post('login', [AuthController::class, 'login' ])->name('login');
Route::post('refresh', [AuthController::class, 'refresh' ]);
Route::post('logout',  [AuthController::class, 'logout' ]);
Route::get('logged',  [AuthController::class, 'getLoggedUser' ]);


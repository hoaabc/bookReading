<?php

use App\Http\Controllers\api\AuthorController;
use App\Http\Controllers\api\BookController;
use App\Http\Controllers\api\BookGenreController;
use App\Http\Controllers\api\CommentController;
use App\Http\Controllers\api\EpisodeController;
use App\Http\Controllers\api\FavoriteController;
use App\Http\Controllers\api\GenreController;
use App\Http\Controllers\api\RoleController;
use App\Http\Controllers\api\SliderController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\AuthController;
use App\Models\BookRating;
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
Route::get('books/{id}/comments' , [BookController::class , 'getComments' ] );

Route::apiResource('authors', AuthorController::class);
Route::apiResource('genres', GenreController::class);
Route::apiResource('bookgenres', BookGenreController::class);
Route::apiResource('bookrating', BookRating::class);
Route::apiResource('comments', CommentController::class);
Route::apiResource('episodes', EpisodeController::class);
Route::apiResource('sliders', SliderController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('favorites', FavoriteController::class);


Route::post('login', [AuthController::class, 'login' ])->name('login');
Route::post('refresh', [AuthController::class, 'refresh' ]);
Route::post('logout',  [AuthController::class, 'logout' ]);
Route::get('logged',  [AuthController::class, 'getLoggedUser' ]);


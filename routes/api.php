<?php

use App\Http\Controllers\api\AuthorController;
use App\Http\Controllers\api\BookController;
use App\Http\Controllers\api\BookGenreController;
use App\Http\Controllers\api\CommentController;
use App\Http\Controllers\api\EpisodeController;
use App\Http\Controllers\api\FavoriteController;
use App\Http\Controllers\api\GenreController;
use App\Http\Controllers\api\IndexController;
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
Route::get("home" , [IndexController::class , 'homeData' ]);
Route::apiResource('users', UserController::class);

Route::apiResource('books', BookController::class);

Route::get('books/{id}/comments' , [BookController::class , 'getComments' ] );
Route::get('books/{id}/episodes' , [BookController::class , 'getEpisodes' ] );

Route::get('latest' , [BookController::class , 'latest' ] );
Route::get('book-series' , [BookController::class , 'bookSeries' ] );
Route::get('most-favorites' , [BookController::class , 'mostFavorite' ] );


Route::apiResource('authors', AuthorController::class);
Route::apiResource('genres', GenreController::class);
Route::get('genres/{genre_id}/books' , [BookController::class , 'getByGenre' ] );

//Route::apiResource('bookgenres', BookGenreController::class);
//Route::apiResource('bookrating', BookRating::class);
//Route::apiResource('episodes', EpisodeController::class);
//Route::apiResource('comments', CommentController::class);
Route::apiResource('sliders', SliderController::class);
//Route::apiResource('roles', RoleController::class);
//Route::apiResource('favorites', FavoriteController::class);


Route::post('login', [AuthController::class, 'login' ])->name('login');
Route::post('refresh', [AuthController::class, 'refresh' ]);
Route::post('logout',  [AuthController::class, 'logout' ]);
Route::get('logged',  [AuthController::class, 'getLoggedUser' ]);
Route::post('register',  [UserController::class, 'register' ]);

Route::get('profile',  [UserController::class, 'showProfile' ]);
Route::put('profile',  [UserController::class, 'editProfile' ]);

Route::post('like',  [UserController::class, 'like' ]);
Route::post('is-like',  [UserController::class, 'isLikedBook' ]);

Route::get('favorite-book',  [UserController::class, 'favoriteBooks' ]);
Route::get('recent-book',  [UserController::class, 'history' ]);
Route::post('rate-book',  [UserController::class, 'rateBook' ]);

Route::get('update-fake-book',  [IndexController::class, 'updateFakeImageBook' ]);



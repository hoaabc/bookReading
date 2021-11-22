<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\BookRatingRepository;
use App\Http\Repository\BookRepository;
use App\Http\Repository\FavoriteRepository;
use App\Http\Repository\HistoryRepository;
use App\Http\Repository\UserRepository;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    protected $favoriteRepo;
    protected $bookRepo;
    protected $historyRepo;
    protected $ratingRepo;

    public function __construct(UserRepository $repository,
                                FavoriteRepository $favoriteRepo,
                                BookRepository $bookRepository ,
                                HistoryRepository  $historyRepository,
                                BookRatingRepository  $ratingRepo)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->favoriteRepo = $favoriteRepo;
        $this->bookRepo = $bookRepository;
        $this->historyRepo = $historyRepository;
        $this->ratingRepo = $ratingRepo;

    }

    public function store(Request $request)
    {

        $request['password'] = bcrypt($request['password']);
        return response($this->repository->store($request), Response::HTTP_OK);
    }

    public function favorites($id)
    {
        return response($this->favoriteRepo->favorites($id), Response::HTTP_OK);

    }

    public function showProfile()
    {
        if (auth()->user() == null) {
            return response([
                "message" => "unauthorized"
            ], Response::HTTP_UNAUTHORIZED);

        }
        return response(Auth::user(), Response::HTTP_OK);

//        return auth()->user();
    }
    public function editProfile(Request $request){
        $request->request->remove('created_at');
        try{
            $this->repository->model->findOrFail(auth()->id())->update($request->except(['id' ,'role_id' , 'created_at']) );
            return response([
                'success' => true,
                'message' => "Update profile successfully"
            ], Response::HTTP_OK);

        }
        catch (\Exception $exception) {
            return response([
                'success' => false,
                'message' => "Something went wrong, Cannot profile"
            ], Response::HTTP_FORBIDDEN);
        }

    }

    public function like(Request $request)
    {
        $booK_id = $request->book_id;
        if ($booK_id == null) {
            return response([
                "message" => "unauthorized",
                "success" => false
            ], Response::HTTP_OK);
        }
        $user_id = auth()->id();
        $favorite_item = $this->favoriteRepo->getFavoriteItem($user_id, $booK_id);
        if ($favorite_item == null) {
            $request->request->add(['user_id' => $user_id]);
            $this->favoriteRepo->store($request);
            return response([
                "message" => "liked",
            ], Response::HTTP_OK);

        } else {
            $this->favoriteRepo->destroy($favorite_item->id);
            return response([
                "message" => "unliked",
            ], Response::HTTP_OK);
        }
    }

    public function favoriteBooks()
    {
        return response($this->repository->show(auth()->id())->favoriteBooks->map(function ($item){
            return [
                'id' => $item['id'],
                'name' => $item['name'],
                'book_image' =>$item['book_image']
            ];
        })
            , Response::HTTP_OK);

    }

    public function history()
    {
        $recent_book_id =  $this->historyRepo->model
            ->select(DB::raw('id, book_id ,  MAX(created_at) as created_at '))
            ->where('user_id', auth()->id())
            ->groupBy('book_id')
            ->pluck('book_id');
        $books = $this->bookRepo->model->select(['id', 'name', 'book_image'])->whereIn('id', $recent_book_id)->get();

        return response($books, Response::HTTP_OK);
    }

    public function rateBook(Request  $request) {
        try{
           $this->ratingRepo->rateBook($request);
            return response([
                'success' => true,
                'message' => 'Rate book successfully'
            ], Response::HTTP_OK);

        }
        catch (\Exception $exception) {
            return response([
                'success' => false,
                'message' => 'Cannot rate book'
            ], Response::HTTP_FORBIDDEN);
        }


    }


}

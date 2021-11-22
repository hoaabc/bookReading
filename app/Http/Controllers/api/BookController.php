<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CrudInterface;
use App\Http\Middleware\checkjwtToken;
use App\Http\Repository\BookRepository;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function __construct(BookRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }
    public function latest() {
        return response($this->repository->latest(), Response::HTTP_OK ) ;
    }
    public function bookSeries() {
        return response($this->repository->bookSeries(), Response::HTTP_OK ) ;
    }
    public function topView() {
        return response($this->repository->topView(), Response::HTTP_OK ) ;

    }
    public  function  mostFavorite() {
        return response($this->repository->mostFavorite(), Response::HTTP_OK ) ;
    }

    public function getComments($id) {
        return response($this->repository->listComments($id) , Response::HTTP_OK ) ;

    }
    public function getEpisodes($id) {
        return response($this->repository->listEpisodes($id) , Response::HTTP_OK ) ;

    }
    public function getByGenre($genre_id) {
        return response($this->repository->getBookByGenre($genre_id), Response::HTTP_OK ) ;
    }

    public  function  test() {
        $data = [
          "ddads" => "dasdsa" ,
          "dsadad23"=>"dasdas"
        ];
        return response( $data , Response::HTTP_OK) ;
    }



}

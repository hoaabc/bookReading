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

    public function getComments($id) {
        return response($this->repository->listComments($id) , Response::HTTP_OK ) ;

    }

    public  function  test() {
        $data = [
          "ddads" => "dasdsa" ,
          "dsadad23"=>"dasdas"
        ];
        return response( $data , Response::HTTP_OK) ;
    }
//    public function index()
//    {
//        return response( $this->repository->getAll() , Response::HTTP_OK );
//
//    }


}

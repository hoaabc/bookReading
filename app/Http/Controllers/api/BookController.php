<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\BookRepository;
use App\Models\Book;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function __construct(BookRepository $repository)
    {
//        parent::__construct($repository);
        $this->repository = new BookRepository();
    }
    public function show( $id)
    {
        return response($this->repository->show($id) , Response::HTTP_OK ) ;
    }
    public function getComments($id) {
        return response($this->repository->listComments($id) , Response::HTTP_OK ) ;

    }

}

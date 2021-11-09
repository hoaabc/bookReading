<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\BookRepository;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookRepository;
    public function __construct(BookRepository $repository)
    {
        parent::__construct($repository);
    }

}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Repository\BaseRepository;
use App\Http\Repository\BookRepository;
use App\Http\Repository\GenreRepository;
use App\Http\Repository\SliderRepository;
use App\Models\Slider;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    //
    protected $sliderRepo;
    protected  $bookRepo;
    protected $genreRepo;


    public function __construct(BookRepository $bookRepository , SliderRepository $sliderRepository , GenreRepository $genreRepository)
    {
        parent::__construct();
        $this->sliderRepo = $sliderRepository;
        $this->bookRepo = $bookRepository;
        $this->genreRepo = $genreRepository;

    }
    public function homeData() {
        $data = [
            "slider" => Slider::all(),
            'genres' => $this->genreRepo->latest(),
            "latest_book" => $this->bookRepo->latest(),
            "book_series" => $this->bookRepo->bookSeries(),
            "top_view" => $this->bookRepo->topView(),
            "most_favorite" =>$this->bookRepo->mostFavorite(),
        ];
        return response($data, Response::HTTP_OK ) ;
    }
}

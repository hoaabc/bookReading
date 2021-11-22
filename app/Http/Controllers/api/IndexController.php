<?php

namespace App\Http\Controllers\api;

use App\Constant\Constant;
use App\Http\Controllers\Controller;
use App\Http\Repository\BaseRepository;
use App\Http\Repository\BookRepository;
use App\Http\Repository\GenreRepository;
use App\Http\Repository\SliderRepository;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Slider;
use App\Models\User;
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
            "latest_book" => $this->bookRepo->Top10latest(),
            "book_series" => $this->bookRepo->Top10bookSeries(),
            "top_view" => $this->bookRepo->Top10View(),
            "most_favorite" =>$this->bookRepo->Top10mostFavorite(),
        ];
        return response($data, Response::HTTP_OK ) ;
    }
    public function updateFakeImageBook() {
        $uids = Slider::all()->pluck('id');
        $count= count(Constant::fake_slider);
        for ($i=0 ; $i < count($uids) ;$i++) {
            Slider::find($uids[$i])->update([
                'slider_img' => Constant::fake_slider[rand(0 ,$count-1)]
            ]);
        }
        return response($uids, Response::HTTP_OK ) ;

    }

}

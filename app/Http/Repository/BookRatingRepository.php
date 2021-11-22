<?php


namespace App\Http\Repository;


use App\Models\Book;
use App\Models\BookRating;

class BookRatingRepository extends  BaseRepository
{
    protected  $bookModel;
    public function __construct(BookRating  $model , Book $bookModel)
    {
        parent::__construct();
        $this->model = $model;
        $this->bookModel = $bookModel;
    }
    public function rateBook($request ) {
        $rating_item = $this->model->where([['user_id' , auth()->id()] , ['book_id' , $request->book_id]])->firstOrFail();
        if($rating_item != null) {
           $rated =  $this->model->findOrFail($rating_item->id)->update($request->only( 'rating_point'));

        }
        else {
            $rated =  $this->model->create([
                'book_id' => $request->book_id,
                'user_id' => auth()->id(),
                'rating_point' => $request->rating_point,
            ]);
        }

        $avg_rating = $this->model->where('book_id'  , $request->book_id )->avg('rating_point');
        $this->bookModel->findOrFail($request->book_id)->update([
            'rating_point' => $avg_rating
        ]);

        return $avg_rating;
    }

}

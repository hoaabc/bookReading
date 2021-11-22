<?php


namespace App\Http\Repository;


use App\Models\Favorite;

class FavoriteRepository extends BaseRepository
{
    public function __construct(Favorite  $favorite)
    {
        parent::__construct();
        $this->model = $favorite;
    }
    public function favorites($user_id) {
        return $this->model->with(['book:id,name,book_image'])->where('user_id' , $user_id)->latest()->get();
    }
    public function  getFavoriteItem($user_id , $book_id) {
       return  $this->model->where([
                               ['user_id' , $user_id ] ,
                               ['book_id' , $book_id]
               ])->first();
    }

}

<?php


namespace App\Http\Repository;


use App\Models\Comment;
use App\Models\Favorite;

class CommentRepository extends  BaseRepository
{
    public function __construct(Favorite  $model)
    {
        parent::__construct();
        $this->model = $model;
    }
    public function top3Comment($id) {
        return Comment::where('book_id' , $id)->latest()->take(3)->get();
    }
}

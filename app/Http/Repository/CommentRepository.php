<?php


namespace App\Http\Repository;


use App\Models\Comment;
use App\Models\Favorite;
use Illuminate\Http\Request;

class CommentRepository extends  BaseRepository
{
    public function __construct(Comment  $model)
    {
        parent::__construct();
        $this->model = $model;
    }
    public function top3Comment($id) {
        return Comment::where('book_id' , $id)->latest()->take(3)->get();
    }
    public function commentOnBook(Request $request) {
        return $this->model->insert([
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'comment_content' => $request->comment_content
        ]);
    }
}

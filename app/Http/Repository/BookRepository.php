<?php


namespace App\Http\Repository;


use App\Models\Book;
use App\Models\Comment;

class BookRepository
{

    public function show($id)
    {
        return Book::with(['genres:id,genre_name', 'author:id,name'])->where('id', $id)->get();
    }

    public function listComments($id)
    {
        return Comment::where('book_id' , $id)->with('user:id,username')->get();
    }


}

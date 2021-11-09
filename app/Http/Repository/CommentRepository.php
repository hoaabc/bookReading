<?php


namespace App\Http\Repository;


use App\Models\Comment;

class CommentRepository extends  BaseRepository
{
    public function __construct(Comment  $comment)
    {
        parent::__construct($comment);
    }
}

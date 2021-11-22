<?php

namespace App\Models;

class BookRating extends BaseModel
{
    protected $table = "book_rating";
    protected $fillable = ['id' , 'book_id' , 'user_id' , 'rating_point' , 'created_at'];

}

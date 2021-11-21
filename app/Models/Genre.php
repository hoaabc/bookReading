<?php

namespace App\Models;

class Genre extends BaseModel
{
    protected $table = "genre";
    protected $hidden = ['created_at' , 'pivot' ];

    protected $fillable = [
        'genre_name',
        'description',
        'genre_image',
        'created_at'
    ];

    public function  books() {
        return $this->belongsToMany(Book::class , 'book_genre'  , 'genre_id' , 'book_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends BaseModel
{
    protected $hidden = ['author_id'];
    protected $table = "book";
    protected $fillable = ['name','book_image','description','like_count','view_count','content_text','content_url','chapter_count','status','author_id','is_book_series','rating_point','created_at' ,'published_at','created_by'];
    public function author() {
        return $this->belongsTo(Author::class , 'author_id' , 'id');
    }
    public function  genres() {
        return $this->belongsToMany(Genre::class , 'book_genre'  , 'book_id' , 'genre_id');
    }
    public function comments () {
        return $this->hasMany(Comment::class , 'book_id' , 'id');
    }

}

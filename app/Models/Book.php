<?php

namespace App\Models;

use App\Http\Repository\FavoriteRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends BaseModel
{
    protected $hidden = ['author_id' , 'pivot'];
    protected $table = "book";
    protected $appends = ['is_liked'];

    protected $fillable = ['name','book_image','description','like_count','view_count','content_text','content_url','chapter_count','status','author_id','is_book_series','rating_point','created_at' ,'published_at','created_by'];
    /**
     * @var mixed
     */

    public function author() {
        return $this->belongsTo(Author::class , 'author_id' , 'id');
    }
    public function  genres() {
        return $this->belongsToMany(Genre::class , 'book_genre'  , 'book_id' , 'genre_id');
    }

    public function comments () {
        return $this->hasMany(Comment::class , 'book_id' , 'id');
    }
    public function episodes () {
        return $this->hasMany(Episode::class , 'book_id' , 'id');
    }
    public function getIsLikedAttribute(): bool
    {
        return  $is_like = Favorite::where([
            ['user_id' , auth()->id() ] ,
            ['book_id' , $this->id]
        ])->first() != null;

    }

}

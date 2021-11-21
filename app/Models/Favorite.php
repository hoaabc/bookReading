<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends BaseModel
{
    protected $table = "favorite";
    protected $fillable = ['user_id', 'book_id' , 'created_at'];
    protected $hidden =   ['user_id', 'book_id' , 'created_at'];

    public  function  user() {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function  book() {
        return $this->belongsTo(Book::class , 'book_id' , 'id');
    }
}

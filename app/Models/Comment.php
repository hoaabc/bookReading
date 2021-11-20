<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends BaseModel
{
    protected $table = "comment";
    protected $hidden = ['user_id' , 'book_id'];

    public function user() {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

}

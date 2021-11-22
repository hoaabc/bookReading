<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends BaseModel
{
    protected $table = "history";
    protected $fillable = ["book_id" , "user_id" , "created_at"] ;


}

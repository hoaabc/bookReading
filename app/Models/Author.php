<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends BaseModel
{
    protected $table = "author";
    protected $fillable = ["name" , "description" , "created_at"] ;

}

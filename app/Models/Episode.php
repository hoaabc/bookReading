<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends BaseModel
{
    protected $table = "episode";
    protected $fillable = ['name' , 'book_id' , 'created_at' , 'content_url', 'status'];
    protected $hidden = ['book_id'];
}

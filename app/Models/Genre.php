<?php

namespace App\Models;

class Genre extends BaseModel
{
    protected $table = "genre";

    protected $fillable = [
        'genre_name',
        'description',
        'genre_image',
        'created_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends BaseModel
{

    protected $table = "book";
    public function authors() {
        return $this->hasMany(Author::class);
    }

}

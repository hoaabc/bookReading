<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends BaseModel
{
    protected $table = "slider";
    protected $fillable = ['name' , 'slider_url' , 'created_at' , 'created_by'] ;

}

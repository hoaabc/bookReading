<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{

    use HasFactory;
    protected $table = "user";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'full_name',
        'phone',
        'role_id',
        'created_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();

    }

    public function getJWTCustomClaims()
    {
        return [
            'id'              => $this->id,
            'full_name'      => $this->full_name,
            'email'           => $this->email,
            'role'         => $this->role_id,

        ];

    }
    public function  favoriteBooks() {
        return $this->belongsToMany(Book::class , 'favorite'  , 'user_id' , 'book_id');
    }
    public function  bookHistory() {
        return $this->belongsToMany(Book::class , 'history'  , 'user_id' , 'book_id');
    }
}

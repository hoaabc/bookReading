<?php


namespace App\Http\Repository;


use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRepository extends  BaseRepository
{
    public function __construct(User  $user)
    {
        parent::__construct($user);
    }


}

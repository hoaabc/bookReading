<?php


namespace App\Http\Repository;


use App\Constant\Constant;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRepository extends  BaseRepository
{

    public function __construct(User  $user)
    {
        parent::__construct();
        $this->model = $user;
    }
    public function register(Request  $request) {

        $user_data = $request->only(['username', 'email' , 'password' , 'full_name' , 'phone']);
        $user_data['password'] = bcrypt( $user_data['password'] );
        $additional_data = [
          'role_id' => Constant::ROLE['user']
        ];
        $user_data = array_merge($user_data, $additional_data);
        $this->model->insert($user_data);

    }



}

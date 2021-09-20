<?php


namespace App\Http\Repository;


use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRepository implements BaseRepositoryInterface
{
    public $model ;
    public function __construct(User  $user)
    {
        $this->model = $user;
    }

    public function getAll()
    {
        return $this->model->paginate(10);


    }

    public function store( $request)
    {
        return $this->model->create($request->all()) ;

    }

    public function show($user)
    {
        return $user;
    }

    public function update($request, $user)
    {
        return $user->update($request->all());
    }

    public function destroy($user)
    {
        return $user->delete() ;
    }
}

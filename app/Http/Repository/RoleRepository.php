<?php


namespace App\Http\Repository;


use App\Models\BookGenre;
use App\Models\Role;

class RoleRepository  extends  BaseRepository
{
    public function __construct(Role  $model)
    {
        parent::__construct();
        $this->model = $model;
    }
}

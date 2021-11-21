<?php


namespace App\Http\Repository;


use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    public $model ;
    public function __construct()
    {
//        $this->model = new BaseModel();
    }
    public function getAll()
    {
        return $this->model->latest()->paginate(20);
    }

    public function store( $request)
    {
        return $this->model->create($request->all()) ;

    }

    public function show($id)
    {
        return  $this->model->findOrFail($id)  ;
    }

    public function update($request, $id)
    {
        return $this->model->findOrFail($id)->update($request->all());
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}

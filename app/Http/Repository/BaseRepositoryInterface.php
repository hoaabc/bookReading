<?php


namespace App\Http\Repository;


use App\Models\User;
use Illuminate\Http\Request;

interface BaseRepositoryInterface
{
    public function getAll() ;
    public function store($request);
    public function show($model);
    public function update( $request,  $model);
    public function destroy($model);
}

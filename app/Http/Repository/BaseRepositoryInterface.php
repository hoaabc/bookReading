<?php


namespace App\Http\Repository;


use App\Models\User;
use Illuminate\Http\Request;

interface BaseRepositoryInterface
{
    public function getAll();
    public function store( $request);
    public function show($id);
    public function update($request, $id);
    public function destroy($id);

}

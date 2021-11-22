<?php


namespace App\Http\Repository;


use App\Models\History;

class HistoryRepository extends BaseRepository
{
    public function __construct(History  $model)
    {
        parent::__construct();
        $this->model = $model;
    }
}

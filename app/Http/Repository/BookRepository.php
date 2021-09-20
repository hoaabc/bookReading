<?php


namespace App\Http\Repository;


use App\Models\Book;

class BookRepository implements BaseRepositoryInterface
{
    public $model ;
    public function __construct(Book  $book)
    {
        $this->model = $book;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function store($request)
    {
        // TODO: Implement store() method.
    }

    public function show($model)
    {
        // TODO: Implement show() method.
    }

    public function update($request, $model)
    {
        // TODO: Implement update() method.
    }

    public function destroy($model)
    {
        // TODO: Implement destroy() method.
    }
}

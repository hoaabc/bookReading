<?php


namespace App\Http\Repository;


use App\Models\Comment;

class CommentRepository implements  BaseRepositoryInterface
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function store($request)
    {
        // TODO: Implement store() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
    public function top3Comment($id) {
        return Comment::where('book_id' , $id)->latest()->take(3)->get();
    }
}

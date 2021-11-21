<?php


namespace App\Http\Repository;


use App\Models\Book;
use App\Models\Comment;

class BookRepository extends BaseRepository
{
    public function __construct(Book  $book)
    {
        parent::__construct();
        $this->model = $book;
    }
    public function show($id)
    {
        $this->model->findOrFail($id)->increment('view_count', 1);
        $top3Comment = Comment::where('book_id' , $id)->latest()->take(3)->get();
        return $this->model->with(['genres:id,genre_name', 'author:id,name' ]) ->with('episodes:book_id,name,created_at,content_url,status')
                    ->with(['comments' => function($query) {$query->with('user:id,username')->latest()->take(3);}]) //get latest 3 comment with book
                    ->where('id', $id)->get();
    }

    public function listComments($id)
    {
        return Comment::where('book_id' , $id)->with('user:id,username')->get();
    }


    public function getAll()
    {
        return $this->model->latest()->paginate(20);

    }

    public function store($request)
    {
        return $this->model->create($request->all()) ;
    }

    public function update($request, $id)
    {
        return $this->model->findOrFail($id)->update($request->all());
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);

    }
    public function latest() {
        return $this->model->select(['id', 'name' , 'book_image'])->latest()->take(10)->get();
    }
    public function bookSeries() {
        return $this->model->select(['id', 'name' , 'book_image'])->where('is_book_series' ,1)->latest()->take(10)->get();
    }
    public function topView() {
        return $this->model->select(['id', 'name' , 'book_image'])->latest()->orderBy('view_count' , 'desc')->take(10)->get();

    }
    public  function  mostFavorite() {
        return $this->model->select(['id', 'name' , 'book_image'])->latest()->orderBy('like_count' , 'desc')->take(10)->get();
    }

    public function test() {
        return json_encode([
            "adasdas" => "dasdad"
        ]);
    }
}

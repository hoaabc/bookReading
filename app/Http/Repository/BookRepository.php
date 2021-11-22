<?php


namespace App\Http\Repository;


use App\Models\Book;
use App\Models\Comment;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\History;

class BookRepository extends BaseRepository
{
    protected $historyModel ;
    public function __construct(Book  $book , History  $historyModel)
    {
        parent::__construct();
        $this->model = $book;
        $this->historyModel = $historyModel;
    }
    public function show($id)
    {
        // add to history
        $this->historyModel->create([
            'user_id' => auth()->id(),
            'book_id' => $id
        ]);
        //increase view
        $this->model->findOrFail($id)->increment('view_count', 1);
        return $this->model
                    ->with(['genres:id,genre_name', 'author:id,name' ])
                    ->with('episodes:book_id,name,created_at,content_url,status')
                    ->with(['comments' => function($query) {$query->with('user:id,username')->latest()->take(3);}]) //get latest 3 comment with book
                    ->where('id', $id)->get();
    }

    public function listComments($id)
    {
        return Comment::where('book_id' , $id)->with('user:id,username')->get();
    }

    public function listEpisodes($id)
    {
        return Episode::where('book_id' , $id)->orderBy('name' , 'asc')->get();
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
        return $this->model->select(['id', 'name' , 'book_image'])->latest()->get();
    }
    public function bookSeries() {
        return $this->model->select(['id', 'name' , 'book_image'])->where('is_book_series' ,1)->latest()->get();
    }
    public function topView() {
        return $this->model->select(['id', 'name' , 'book_image'])->latest()->orderBy('view_count' , 'desc')->get();

    }
    public  function  mostFavorite() {
        return $this->model->select(['id', 'name' , 'book_image'])->latest()->orderBy('like_count' , 'desc')->get();
    }

    //top10
    public function Top10latest() {
        return $this->model->select(['id', 'name' , 'book_image'])->latest()->take(10)->get();
    }
    public function Top10bookSeries() {
        return $this->model->select(['id', 'name' , 'book_image'])->where('is_book_series' ,1)->latest()->take(10)->get();
    }
    public function Top10View() {
        return $this->model->select(['id', 'name' , 'book_image'])->latest()->orderBy('view_count' , 'desc')->take(10)->get();

    }
    public  function  Top10mostFavorite() {
        return $this->model->select(['id', 'name' , 'book_image'])->latest()->orderBy('like_count' , 'desc')->take(10)->get();
    }
    public function getBookByGenre($id) {
        return Genre::findOrFail($id)->books->map(function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
                'book_image' =>$item['book_image']
            ];
        });
    }

    public function test() {
        return json_encode([
            "adasdas" => "dasdad"
        ]);
    }
}

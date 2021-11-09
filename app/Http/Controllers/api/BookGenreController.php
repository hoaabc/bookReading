<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BookGenre;
use Illuminate\Http\Request;

class BookGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookGenre  $bookGenre
     * @return \Illuminate\Http\Response
     */
    public function show(BookGenre $bookGenre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookGenre  $bookGenre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookGenre $bookGenre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookGenre  $bookGenre
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookGenre $bookGenre)
    {
        //
    }
}

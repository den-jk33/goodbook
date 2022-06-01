<?php

namespace App\Http\Controllers;

use App\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Get list of all books
     *
     * @return \App\Books
     */
    public function getList() //получение списка альбомов
    {
        $books = Books::all();
        return view('main')->with('books',$books);
    }


}

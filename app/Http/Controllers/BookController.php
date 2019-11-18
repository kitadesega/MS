<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function show($bookId){
        $bookModel = new BooksModel();

        $book = $bookModel->getBooks($bookId);

        return view('book.show.blade.php',['book' => $book]);
    }


}

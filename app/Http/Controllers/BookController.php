<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\RentalModel;
use App\Models\ReviewModel;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function show($bookId){
        $bookModel = new BooksModel();
        $reviewModel = new ReviewModel();
        $rentalModel = new RentalModel();
        $book = $bookModel->getBooksFirst($bookId);

        $book->returnDay = '';
        if($book->rental_flag === 1) {
            $book->returnDay = $rentalModel->returnDay($book->id);
        }
        $book->starAvg = $reviewModel->getAvgRank($book->id);
        $book->reviewCount = $reviewModel->getReviewCount($book->id);

        return view('book.show',['book' => $book]);
    }


}

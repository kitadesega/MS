<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\RentalModel;
use App\Models\ReviewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booksModel = new BooksModel();
        $rentalModel = new RentalModel();
        $reviewModel = new ReviewModel();
        $books = $booksModel->getBooks();

        //貸出状態が1(貸出中)であれば返却日を入れる
        foreach ($books as $book){
            $book->returnDay = '';
            if($book->rental_flag === 1) {
                $book->returnDay = $rentalModel->returnDay($book->id);
            }
            $book->starAvg = $reviewModel->getAvgRank($book->id);
            $book->reviewCount = $reviewModel->getReviewCount($book->id);
        }
        //貸出履歴からお勧めを表示
        $rentalRecommendedBooks = $booksModel->rentalRecommendedBooks(Auth::user()->id);
        foreach ($rentalRecommendedBooks as $book){
            $book->starAvg = $reviewModel->getAvgRank($book->id);
            $book->reviewCount = $reviewModel->getReviewCount($book->id);
        }
        $reviewRecommendedBooks = $booksModel->reviewRecommendedBooks(Auth::user()->id);
        foreach ($reviewRecommendedBooks as $book){
            $book->starAvg = $reviewModel->getAvgRank($book->id);
            $book->reviewCount = $reviewModel->getReviewCount($book->id);
        }

//        dd($reviewRecommendedBooks);
        return view('home',[
            'books'=>$books,
            'reviewRecommendedBooks' => $reviewRecommendedBooks,
            'rentalRecommendedBooks' => $rentalRecommendedBooks
        ]);
    }
}

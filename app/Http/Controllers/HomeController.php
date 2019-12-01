<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\NaturalLanguageModel;
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
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

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

//        dd($booksModel->getAvgScoreAndBookId(17));
        //貸出状態が1(貸出中)であれば返却日を入れる
        foreach ($books as $book){
            $book->returnDay = '';
            if($book->rental_flag === 1) {
                $book->returnDay = $rentalModel->returnDay($book->id);
            }
//            $book->starAvg = $reviewModel->getAvgRank($book->id);
//            $book->reviewCount = $reviewModel->getReviewCount($book->id);
        }

        if(Auth::user()){
            //貸出履歴からお勧めを取得
            $rentalRecommendedBooks = $booksModel->rentalRecommendedBooks(Auth::user()->id);
            //レビュー傾向からのお勧めを取得
            $reviewRecommendedBooks = $booksModel->reviewRecommendedBooks(Auth::user()->id);

            foreach ($rentalRecommendedBooks as $book){
                $book->starAvg = $booksModel->getAvgRank($book->id);
//                $book->reviewCount = $reviewModel->getReviewCount($book->id);
            }
//            dd($rentalRecommendedBooks);

//            foreach ($reviewRecommendedBooks as $book){
//                $book->starAvg = $reviewModel->getAvgRank($book->id);
//                $book->reviewCount = $reviewModel->getReviewCount($book->id);
//            }
        }else{
            $rentalRecommendedBooks = null;
            $reviewRecommendedBooks = null;
        }

        $apiModel = new NaturalLanguageModel();
//        $a = $apiModel->allScoreSort();

//        $reviews = DB::table('review')
//            ->get();
//        foreach($reviews as $review){
//            $apiModel->sentimentAnalysis($review->book_id,$review->id,$review->Impressions);
//        }


        return view('home',[
            'books'=>$books,
//            'reviewRecommendedBooks' => $reviewRecommendedBooks,
            'rentalRecommendedBooks' => $rentalRecommendedBooks
        ]);
    }
}

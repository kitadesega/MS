<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\RentalModel;
use App\Models\ReviewModel;
use Google\Cloud\Language\LanguageClient;
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

        //貸出状態が1(貸出中)であれば返却日を入れる
        foreach ($books as $book){
            $book->returnDay = '';
            if($book->rental_flag === 1) {
                $book->returnDay = $rentalModel->returnDay($book->id);
            }
            $book->starAvg = $reviewModel->getAvgRank($book->id);
            $book->reviewCount = $reviewModel->getReviewCount($book->id);
        }

        if(Auth::user()){
            //貸出履歴からお勧めを取得
            $rentalRecommendedBooks = $booksModel->rentalRecommendedBooks(Auth::user()->id);
            //レビュー傾向からのお勧めを取得
            $reviewRecommendedBooks = $booksModel->reviewRecommendedBooks(Auth::user()->id);

            foreach ($rentalRecommendedBooks as $book){
                $book->starAvg = $reviewModel->getAvgRank($book->id);
                $book->reviewCount = $reviewModel->getReviewCount($book->id);
            }

            foreach ($reviewRecommendedBooks as $book){
                $book->starAvg = $reviewModel->getAvgRank($book->id);
                $book->reviewCount = $reviewModel->getReviewCount($book->id);
            }
        }else{
            $rentalRecommendedBooks = null;
            $reviewRecommendedBooks = null;
        }
//        $config = config_path().'/json/My First Project-afd2f228a06e.json';
//
//
//        putenv("GOOGLE_APPLICATION_CREDENTIALS=$config");
//        $projectId = 'third-index-260107';
//# Instantiates a client
//        $language = new LanguageClient([
//            'projectId' => $projectId
//        ]);
//# The text to analyze
//        $text = '好き。大好き。とっても大好き';
//# Detects the sentiment of the text
//        $annotation = $language->analyzeSentiment($text);
//
//        $sentiment = $annotation->sentiment();
//        dd($sentiment);
//        echo 'Text: ' . $text . '
//Sentiment: ' . $sentiment['score'] . ', ' . $sentiment['magnitude'];

        return view('home',[
            'books'=>$books,
            'reviewRecommendedBooks' => $reviewRecommendedBooks,
            'rentalRecommendedBooks' => $rentalRecommendedBooks
        ]);
    }
}

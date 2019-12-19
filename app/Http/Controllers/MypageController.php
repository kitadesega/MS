<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\NaturalLanguageModel;
use App\Models\ReviewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $reviewModel = new ReviewModel();
        $apiModel = new NaturalLanguageModel();
        $bookModel = new BooksModel();
        $history = $reviewModel->getReviewAndScore(Auth::user()->id);
        $books = $bookModel->reviewRecommendedBooks(Auth::user()->id);

        $Scores = $apiModel->getScoreAddition(2);

        $positives = $Scores[0];
        $positiveTotal = $Scores[1];
        $negatives = $Scores[2];
        $negativeTotal = $Scores[3];

//        dd($avgScores);
        return view('mypage.index',[
            'history' => $history,
            'books' => $books,
            'positives'=>$positives,
            'negatives'=>$negatives,
            'positiveTotal' => $positiveTotal,
            'negativeTotal' => $negativeTotal
        ]);
    }
}

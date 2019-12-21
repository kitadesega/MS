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

        //ポジティブスコアとネガティブスコアの奴
        $Scores = $apiModel->getScoreAddition(Auth::user()->id);

        $positives = $Scores[0];
        $positiveTotal = $Scores[1];
        $negatives = $Scores[2];
        $negativeTotal = $Scores[3];

        $yetCategorys = $bookModel->getCategorys();
        $myCategorys = $bookModel->getMyReadCategorys();
        //キーと値を入れ替える
        $yetCategorys = $yetCategorys->flip();
        $myCategorys = $myCategorys->flip();
        //自分が読んだ事のある本のカテゴリーを削除し、読んだ事の無いカテゴリーのみが残る
        foreach ( $myCategorys as $key => $value ){
            $yetCategorys->pull($key);
        }

        //キーと値を入れ替える
        $yetCategorys = $yetCategorys->flip();


//        dd($yetCategorys->random());
        $yetRandomCategory = $yetCategorys->random();
        return view('mypage.index',[
            'history' => $history,
            'books' => $books,
            'positives' => $positives,
            'negatives' => $negatives,
            'positiveTotal' => $positiveTotal,
            'negativeTotal' => $negativeTotal
        ]);
    }
}

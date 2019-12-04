<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
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
        $bookModel = new BooksModel();
        $history = $reviewModel->getReviewAndScore(Auth::user()->id);
        $books = $bookModel->reviewRecommendedBooks(Auth::user()->id);

        return view('mypage.index',['history' => $history,'books' => $books]);
    }
}

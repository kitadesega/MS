<?php

namespace App\Http\Controllers;

use App\Models\ReviewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index(){
        $reviewModel = new ReviewModel();
        $history = $reviewModel->getReviewAndScore(Auth::user()->id);
        return view('mypage.index',['history' => $history]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\RentalModel;
use App\Models\ReviewModel;
use Illuminate\Http\Request;
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
//                $book->startDay = DB::table('rental')->where('book_id','=',$book->id)->value('created_at');
//                $book->startDay = date('Y年m月d日',  strtotime($book->startDay));
            }
            $book->starAvg = $reviewModel->getAvgRank($book->id);
        }

        return view('home',['books'=>$books]);
    }
}

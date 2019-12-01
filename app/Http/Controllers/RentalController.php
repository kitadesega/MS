<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\RentalModel;
use App\Models\ReviewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rentalHistory(){
        $rentalModel = new RentalModel();
        $rentalHistory = $rentalModel->getRentalHistory(Auth::user()->id);


        return view('rental.rental_history',['rentalHistory' => $rentalHistory]);
    }

    //バーコードを通して借りる本を選択
    public function rentBookInput(){
        return view('rental.rent_input');
    }


    //非同期での本の検索
    public function ajaxBookSearch(Request $request){

        $booksModel = new BooksModel();
        $rentalModel = new RentalModel();

        $book = $booksModel->bookSearch($request->bookBarcode);
        $book->returnDay = '';

        //貸出状態であれば返却日を加える
        if($book->rental_flag === 1) {
            $book->returnDay = $rentalModel->returnDay($book->id);
        }

        return response()->json($book);
    }

    //貸出処理
    public function rent(Request $request){

        $rentalModel = new RentalModel();
        $booksModel = new BooksModel();

        $rentalModel->rental(Auth::user()->id,$request->bookId,$request->returnDate);
        $booksModel->bookStateUpdate($request->bookId,1);

        return redirect('/');
    }

    public function rentConfirm(Request $request){

        $bookId = $request->bookId;

        return view('rental.rent_confirm',['bookId'=>$bookId]);
    }

    //返却する本のバーコード登録
    public function returnBookInput(){
        return view('rental.return_input');
    }

    //本の返却
    public function returnBook(Request $request){

        $rentalModel = new RentalModel();
        $booksModel = new BooksModel();

        $rentalModel->bookReturn(Auth::user()->id,$request->bookId);
        //返却するのでrentalFlagを0に
        $booksModel->bookStateUpdate($request->bookId,0);
        //貸出履歴からお勧めを表示
        $rentalRecommendedBooks = $booksModel->rentalRecommendedBooks(Auth::user()->id);

        return view('rental.return_complete',['bookId' => $request->bookId,'rentalRecommendedBooks' => $rentalRecommendedBooks]);
    }

    //レビュー機能
    public function review(Request $request){

    $reviewModel = new ReviewModel();

    $reviewModel->reviewInsert(Auth::user()->id,$request->bookId,$request->Anonymous_flag,$request->Impressions,$request->rank);

       return redirect('/reviewComplete');
    }

}

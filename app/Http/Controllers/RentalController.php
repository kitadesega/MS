<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\RentalModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    //
    public function select(){
        return view('select');
    }

    public function ajaxBookSearch(Request $request){
        $booksModel = new BooksModel();
        $rentalModel = new RentalModel();
        $book = $booksModel->bookSearch($request->bookBarcode);

        if($book->rental_flag == 1) {
            $book->returnDay = $rentalModel->returnDay($book->id);
        }

        return response()->json($book);
    }
    public function rent(Request $request){

        $rentalModel = new RentalModel();
        $booksModel = new BooksModel();

        $rentalModel->rental(Auth::user()->id,$request->bookId,$request->returnDate);
        $booksModel->bookStateUpdate($request->bookId,1);

        return redirect('/');
    }

    public function rentConfirm(Request $request){

        $bookId = $request->bookId;

        return view('rental_confirm',['bookId'=>$bookId]);
    }

    public function bookReturnInput(){
        return view('return');
    }

    public function bookReturn(Request $request){

        $rentalModel = new RentalModel();
        $booksModel = new BooksModel();

        $rentalModel->bookReturn(Auth::user()->id,$request->bookId);
        $booksModel->bookStateUpdate($request->bookId,0);
        return view('returnComplete');
    }
}

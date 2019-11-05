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
}

<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\RentalModel;
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

        $books = DB::table('books')
            ->get();

        foreach ($books as $book){
            if($book->rental_flag == 1) {
                $book->returnDay = $rentalModel->returnDay($book->id);
            }
        }

        return view('home',['books'=>$books]);
    }
}

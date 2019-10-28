<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    //
    public function rent(Request $request){
        $bookId = $request->bookId;
        $userId = Auth::user()->id;
        DB::table('rental')
            ->insert([
                'user_id'=>$userId,
                'book_id'=>$bookId,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('books')
            ->where('id','=',$bookId)
            ->update([
                'rental_flag'=>1,
            ]);
        return redirect('/');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BooksModel extends Model
{
    public function bookStateUpdate($bookId,$rentalFlag){
        DB::table('books')
            ->where('id','=',$bookId)
            ->update([
                'rental_flag' => $rentalFlag,
            ]);
    }

    public function bookSearch($book_barcode){
        $book = DB::table('books')
            ->where('book_barcode','=',$book_barcode)
            ->first();

        return $book;



    }
}

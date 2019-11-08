<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BooksModel extends Model
{
    //全ての本のデータ取得
    public function getBooks(){
        return DB::table('books')
            ->get();
    }

    //貸出状態、貸出状態解除
    public function bookStateUpdate($bookId,$rentalFlag){
        DB::table('books')
            ->where('id','=',$bookId)
            ->update([
                'rental_flag' => $rentalFlag,
            ]);
    }

    //バーコードから本を検索
    public function bookSearch($book_barcode){
        $book = DB::table('books')
            ->where('book_barcode','=',$book_barcode)
            ->first();

        return $book;

    }
}

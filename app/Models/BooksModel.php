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

    //レンタル履歴からおすすめの本を小ジャンルから抽出
    public function rentalRecommendedBooks($userId){

        $smallgenre_books = DB::table('rental')
            ->select('smallgenre')
            ->join('books','books.id','=','rental.book_id')
            ->get();

        foreach($smallgenre_books as $book){
            $smallgenre[] = $book->smallgenre;
        }

        //重複したカテゴリーを削除し,キーを振り直し
        $smallgenre = array_values(array_unique($smallgenre));

        foreach ($smallgenre as $value) {
            $tmp_books = DB::table('books')
                ->where('smallgenre', '=', $value)
                ->get();

            foreach ($tmp_books as $book) {
                $books[] = $book;
            }
        }

        //５冊ランダムに選出
        for($i=0; $i<5; $i++){
            if(!empty($books)) {
                $tmpNumber = array_rand($books);
                $randBooks[] = $books[$tmpNumber];
                array_splice($books, $tmpNumber, 1);
            }
        }

        return $randBooks;

    }
}

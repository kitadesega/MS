<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RentalModel extends Model
{
    //貸出処理
    public function rental($userId,$bookId,$returnDate){
        DB::table('rental')
            ->insert([
                'user_id' => $userId,
                'book_id' => $bookId,
                'return_date' => $returnDate,
                'created_at' => now(),
                'updated_at' => now(),
                'return_flag' => 0
            ]);
    }

    //返却日指定
    public function returnDay($bookId){
        return DB::table('rental')
            ->where('book_id','=',$bookId)
            ->value('return_date');
    }

    //本の返却処理
    public function bookReturn($userId,$bookId){
        return DB::table('rental')
            ->where('user_id','=',$userId)
            ->where('book_id','=',$bookId)
            ->update(['return_flag' => 1]);
    }

    //レンタル履歴からおすすめの本を小ジャンルから抽出
    public function recommendedBooks($userId){

        $smallgenre_books = DB::table('rental')
            ->select('smallgenre')
            ->join('books','books.id','=','rental.book_id')
            ->get();

        foreach($smallgenre_books as $book){
            $smallgenre[] = $book->smallgenre;
        }

        $smallgenre = array_unique($smallgenre);
        $smallgenre = array_values($smallgenre);

        foreach ($smallgenre as $value){
            $tmp_books = DB::table('books')
                ->where('smallgenre','=',$value)
                ->get();

            foreach($tmp_books as $book){
                $books[] = $book;
            }
        }

    }
}

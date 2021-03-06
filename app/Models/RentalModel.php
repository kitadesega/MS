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

    //本の貸し出し履歴
    public function getRentalHistory($userId){
        return DB::table('rental')
            ->join('books','books.id','=','rental.book_id')
            ->where('user_id','=',$userId)
            ->get();
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewModel extends Model
{
    public function reviewInsert($userId,$bookId,$Impressions){
        $insertId = DB::table('review')
            ->insertGetId([
                'user_id' => $userId,
                'book_id' => $bookId,
                'Impressions' => $Impressions,
                'created_at' => now(),
                'updated_at' => now()
            ]);

        return $insertId;
    }

    //本のidからレビューとスコアをセットで取得
    public function getReviewAndScoreForBookId($bookId){
        return DB::table('review')
            ->join('naturallanguage','review.id','=','naturallanguage.review_id')
            ->where('review.book_id','=',$bookId)
            ->get();
    }

    public function getAvgRank($bookId){
        $ranks = DB::table('review')
            ->select('rank')
            ->where('book_id','=',$bookId)
            ->get();

        if(!$ranks->isEmpty()) {
            foreach ($ranks as $rank) {
                $array[] = $rank->rank;
            }
            $avr = round(array_sum($array) / count($array),2);
            $avr = $avr/5 * 100;
        }else{
            $avr = false;
        }

        return $avr;
    }

    public function getReviewCount($bookId){
        $reviewCount = DB::table('review')
            ->select('rank')
            ->where('book_id','=',$bookId)
            ->count();

        return $reviewCount;
    }

    public function getReviewAndScore($userId){
        $result = DB::table('review')
            ->join('naturallanguage','review.id','=','naturallanguage.review_id')
            ->join('books','books.id','=','review.book_id')
            ->where('review.user_id','=',$userId)
            ->limit(15)->get();

        return $result;

    }



}

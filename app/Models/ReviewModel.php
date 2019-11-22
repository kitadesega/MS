<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewModel extends Model
{
    public function reviewInsert($userId,$bookId,$AnonymousFlag,$Impressions,$rank){
        DB::table('review')
            ->insert([
                'user_id' => $userId,
                'book_id' => $bookId,
                'Anonymous_flag' => $AnonymousFlag,
                'Impressions' => $Impressions,
                'rank' => $rank,
                'created_at' => now(),
                'updated_at' => now()
            ]);
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



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Google\Cloud\Language\LanguageClient;

class NaturalLanguageModel extends Model
{
    public function sentimentAnalysis($bookId,$reviewId,$reviewText){
        $config = config_path().'/json/My First Project-afd2f228a06e.json';

        putenv("GOOGLE_APPLICATION_CREDENTIALS=$config");
        $projectId = 'third-index-260107';

        $language = new LanguageClient([
            'projectId' => $projectId
        ]);

        $text = $reviewText;
        $annotation = $language->analyzeSentiment($text);

        $sentiment = $annotation->sentiment();

        DB::table('naturallanguage')
            ->insert([
                'book_id' => $bookId,
                'review_id' => $reviewId,
                'score' => $sentiment['score'],
                'magnitude' => $sentiment['magnitude'],

            ]);
    }

    //感情分析スコアをソートして本の情報と結合して取得
    public function allScoreSort(){
        //全てのレビューから各本の感情分析スコアを取得
        $avgScoresAndbookIds= DB::table('naturallanguage')
            ->select(DB::raw('avg(naturallanguage.score) as avg_score'),'naturallanguage.book_id')
            ->groupBy('naturallanguage.book_id')
            ->get();

        $items = new Collection();

        //平均スコアと本の情報を結合
        foreach($avgScoresAndbookIds as $value){
            $tmpItem = DB::table('books')
                ->where('id','=',$value->book_id)
                ->first();
            //平均スコアの四捨五入
            $tmpItem->avg_score = round($value->avg_score,2);

            $items[] =  $tmpItem;
        }

        //ソートしてキーの振り直しをして返す
        return $items->sortByDesc('avg_score')->values();
    }

    //ユーザーIDからカテゴリーとその平均評価を取得
    public function getScoreAddition($userId){
        $results =  DB::table('review')
            ->join('naturallanguage','naturallanguage.book_id','=','review.book_id')
            ->join('books','review.book_id','=','books.id')
            ->where('review.user_id','=',$userId)
            ->get();

        $positives = array();
        $negatives = array();

        $positiveTotalScore = 0;
        $negativeTotalScore = 0;
        foreach ($results as $result) {
            $positives[$result->largegenre] = 0;
            $negatives[$result->largegenre] = 0;
        }

        foreach ($results as $result){
            if($result->score > 0) {
                $positives[$result->largegenre] += $result->score;
                $positiveTotalScore += $result->score;
            }else{
                $negatives[$result->largegenre] += $result->score;
                $negativeTotalScore += $result->score;
            }
        }

        $resultArray = array();
        $resultArray[] = $positives;
        $resultArray[] = $positiveTotalScore;
        $resultArray[] = $negatives;
        $resultArray[] = $negativeTotalScore;


        return $resultArray;
    }


}

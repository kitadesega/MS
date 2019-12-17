<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BooksModel extends Model
{
    //全ての本のデータ取得
    public function getBooks(){
        return DB::table('books')
            ->paginate(6);
    }

    public function getBooksFirst($bookId){
        return DB::table('books')
            ->where('id','=',$bookId)
            ->first();
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

    //大ジャンルの種類を取得
    public function getLargegenreList(){
        return DB::table('books')
            ->select('largegenre')
            ->groupBy('largegenre')
            ->get();
    }

    //大ジャンルの種類を取得
    public function getSmallgenreList(){
        return DB::table('books')
            ->select('smallgenre')
            ->groupBy('smallgenre')
            ->get();
    }

    //レンタル履歴からおすすめの本を小ジャンルから抽出
    public function rentalRecommendedBooks($userId){

        $smallgenre_books = DB::table('rental')
            ->select('smallgenre')
            ->join('books','books.id','=','rental.book_id')
            ->where('rental.user_id','=',$userId)
            ->get();

        foreach($smallgenre_books as $book){
            $smallgenre[] = $book->smallgenre;
        }

        //重複したカテゴリーを削除し,キーを振り直し
        $smallgenre = array_values(array_unique($smallgenre));

        $books = array();
        foreach ($smallgenre as $value) {
            $tmp_books = DB::table('books')
                ->where('smallgenre', '=', $value)
                ->get();

            foreach ($tmp_books as $book) {
                $books[] = $book;
            }
        }

        //５冊ランダムに選出
        for($i=0; $i<4; $i++){
            if(!empty($books)) {
                $tmpNumber = array_rand($books);
                $randBooks[] = $books[$tmpNumber];
                unset($books[$tmpNumber]);
            }
        }

        return $randBooks;

    }

    //感情分析からのおすすめ
    public function reviewRecommendedBooks($userId){

        $avgRanksAndLargegenre = $this->getAvgRankAndLargegenre($userId);

        // foreachで1つずつ値を取り出す。カテゴリをキーに中に平均ランクを。
        foreach ($avgRanksAndLargegenre as $value) {
            $avgRanks[$value->largegenre] = $value->avg_rank;
        }

        //平均評価が高い順にソート
        arsort($avgRanks);

        //評価の高いトップ３のカテゴリー(キー)を取得し配列へ
        for($i=0;$i<=2;$i++){
            $largegenres[] = key((array_slice($avgRanks, $i, 1, true)));
        }

//        dd($largegenres);
        $books = array();

        //トップ3のカテゴリーの本を取得して１つの配列に
        foreach ($largegenres as $largegenre){
            $tmpBooks = $this->getBooksForLargegenre($largegenre);
            $books = array_merge_recursive($books, $tmpBooks->all());
        }


        //本の平均評価の取得とソート用の配列の作成
        foreach ((array) $books as $key => $book) {
            $book->avgRank = $this->getAvgRank($book->id);
            $sort[$key] = $book->avgRank;
        }

        //平均評価の大きい順に本を並び替え
        array_multisort($sort, SORT_DESC, $books);

        //上位5冊を取得
        for($i=0; $i<8; $i++){
            if(!empty($books)) {
                $ReBooks[] = $books[$i];
            }
        }

//        dd($ReBooks);

        return $ReBooks;


    }

    //ユーザーIDからカテゴリーとその平均評価を取得
    public function getAvgRankAndLargegenre($userId){
        $results =  DB::table('review')
            ->select(DB::raw('avg(naturallanguage.score) as avg_rank,books.largegenre'))
            ->join('naturallanguage','naturallanguage.book_id','=','review.book_id')
            ->join('books','review.book_id','=','books.id')
            ->where('review.user_id','=',$userId)
            ->groupBy('books.largegenre')
            ->get();

        foreach ($results as $result){
            $result->avg_rank = round($result->avg_rank, 2);
        }

        return $results;
    }

    //カテゴリーから本を取得
    public function getBooksForLargegenre($largegenre){
        return DB::table('books')
            ->where('books.largegenre','=',$largegenre)
            ->get();
    }

    //本のIDから平均スコアを取得
    public function getAvgRank($bookId){
        $tmpScores = DB::table('naturallanguage')
            ->select('score')
            ->where('book_id','=',$bookId)
            ->get();

        if(!$tmpScores->isEmpty()) {
            //連想配列を配列に
            foreach ($tmpScores as $score) {
                $Scores[] = $score->score;
            }
            //平均値を求める
            $avg = round(array_sum($Scores) / count($Scores),4);
        }else{
            $avg = 0;
        }

        return $avg;
    }

    //感情スコアを元にしたソート
    public function getBookScoreSort($user_id){


    }

    //本の平均スコアを取得
    public function getAvgScoreAndBookId($bookId){
        return DB::table('naturallanguage')
            ->select(DB::raw('avg(naturallanguage.score) as avg_score,books.id'))
            ->join('books','naturallanguage.book_id','=','books.id')
            ->where('naturallanguage.book_id','=',$bookId)
            ->groupBy('naturallanguage.book_id')
            ->first();
    }
}

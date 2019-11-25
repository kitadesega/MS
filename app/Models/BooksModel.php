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
        for($i=0; $i<5; $i++){
            if(!empty($books)) {
                $tmpNumber = array_rand($books);
                $randBooks[] = $books[$tmpNumber];
                unset($books[$tmpNumber]);
            }
        }

        return $randBooks;

    }

    public function reviewRecommendedBooks($userId){

        $avgRanksAndSmallgenres = $this->getAvgRankAndSmallgenres($userId);

        // foreachで1つずつ値を取り出す。カテゴリをキーに中に平均ランクを。
        foreach ($avgRanksAndSmallgenres as $value) {
            $avgRanks[$value->smallgenre] = $value->avg_rank;
        }

        //平均評価が高い順にソート
        arsort($avgRanks);

        //評価の高いトップ３のカテゴリー(キー)を取得し配列へ
        for($i=0;$i<=2;$i++){
            $smallgenres[] = key((array_slice($avgRanks, $i, 1, true)));
        }

        $books = array();

        //トップ3のカテゴリーの本を取得して１つの配列に
        foreach ($smallgenres as $smallgenre){
            $tmpBooks = $this->getBooksForSmallgenre($smallgenre);
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
        for($i=0; $i<5; $i++){
            if(!empty($books)) {
                $ReBooks[] = $books[$i];
            }
        }
        return $books;


    }

    //ユーザーIDからカテゴリーとその平均評価を取得
    public function getAvgRankAndSmallgenres($userId){
        return DB::table('review')
            ->select(DB::raw('avg(review.rank) as avg_rank,books.smallgenre'))
            ->join('books','review.book_id','=','books.id')
            ->where('review.user_id','=',$userId)
            ->groupBy('books.smallgenre')
            ->get();
    }

    //カテゴリーから本を取得
    public function getBooksForSmallgenre($smallgenre){
        return DB::table('books')
            ->where('books.smallgenre','=',$smallgenre)
            ->get();
    }

    //本のIDから平均評価を取得
    public function getAvgRank($bookId){
        $tmpRanks = DB::table('review')
            ->select('rank')
            ->where('book_id','=',$bookId)
            ->get();

        if(!$tmpRanks->isEmpty()) {
            //連想配列を配列に
            foreach ($tmpRanks as $rank) {
                $Ranks[] = $rank->rank;
            }
            //平均値を求める
            $avg = round(array_sum($Ranks) / count($Ranks),2);
        }else{
            $avg = 0;
        }

        return $avg;
    }
}

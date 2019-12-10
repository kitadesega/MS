<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SearchModel extends Model
{
    //全件検索
    public function getBooks()
    {
    	return DB::table('books')->get();
    }

	//タイトル検索
    public function getTitleBooks($titleWord)
    {
    	return DB::table('books')
    		->where('title','Like', '%'. $titleWord .'%')
    		->get();
    }

	//あいまい検索
    public function getFuzzyBooks($fuzzyWord)
    {
    	return DB::table('books')
    		->where('detail','Like', '%'. $fuzzyWord .'%')
    		->get();
    }

    public function searchBooks($keyword,$largegenre,$smallgenre){

        $booksQuery = DB::table('books');

        if(!empty($keyword)){
            $booksQuery = $booksQuery
                ->orWhere('title','Like', '%'. $keyword .'%')
                ->orWhere('detail','Like', '%'. $keyword .'%');
        }
        if(!empty($largegenre)){
            $booksQuery = $booksQuery->orWhere('largegenre', $largegenre);
        }

        if(!empty($smallgenre)){
            $booksQuery = $booksQuery->orWhere('smallgenre', $smallgenre);
        }

        $books = $booksQuery->get();
        return $books;

    }

    public function getAvgScore($bookId){
        $avgScore =  DB::table('naturallanguage')
            ->select(DB::raw('avg(naturallanguage.score) as avg_score'))
            ->join('books','naturallanguage.book_id','=','books.id')
            ->where('naturallanguage.book_id','=',$bookId)
            ->groupBy('naturallanguage.book_id')
            ->value('avg_score');

//        if($avgScore)
    }


}

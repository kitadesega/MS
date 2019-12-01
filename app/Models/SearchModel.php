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

    public function searchBooks($largegenre,$smallgenre,$emotion){

        $allBooks = DB::table('books')->get();
        if(!empty($emotion)){
            foreach($allBooks as $book){
                $book->avg_score = $this->getAvgScore($book->id);
            }
            $allBooks->sortByDesc('avg_score')->values();
        }

//dd($largegenre,$smallgenre);
        if(!empty($largegenre)){
            $allBooks = $allBooks->where('largegenre', $largegenre)->values();;
        }

        if(!empty($smallgenre)){
            $allBooks = $allBooks->where('smallgenre', $smallgenre)->values();;
        }


        return $allBooks;

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

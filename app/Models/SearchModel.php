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

    //おすすめジャンル検索
    public function getTitletagBooks($titleTag, $rejectmainbook)
    {
    	$titleRecomend = DB::table('books')
    		->where('titletag','=', $titleTag)
    		->where('id','<>', $rejectmainbook)
    		->get();

    	return $titleRecomend;
    }
    
    public function getGenreBooks($smallGenre, $rejectmainbook)
    {
    	$genreRecomend = DB::table('books')
    		->where('smallgenre','=', $smallGenre)
    		->where('id','<>', $rejectmainbook)
    		->get();

    	return $genreRecomend;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\SearchModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    public function index(){
        $booksModel = new BooksModel();
        $largegenres = $booksModel->getLargegenreList();
        $smallgenres = $booksModel->getSmallgenreList();
    	return view('search.index',['largegenres' => $largegenres,'smallgenres' => $smallgenres]);
    }

    public function search(Request $request){
        $searchModel = new SearchModel();
        $booksModel = new BooksModel();
        $largegenres = $booksModel->getLargegenreList();
        $smallgenres = $booksModel->getSmallgenreList();
        $largegenre = $request->input('largegenre');
        $smallgenre = $request->input('smallgenre');
        $emotion = $request->input('emotion');

        $books = $searchModel->searchBooks($largegenre,$smallgenre,$emotion);

        return view('search.result', ['result'=>$books,'largegenres' => $largegenres,'smallgenres' => $smallgenres]);
    }

    public function genreSelect(Request $request){
    	$searchModel = new SearchModel();
    	
        //本の詳細データを呼び出す処理(後々変更)
    	$datas = $searchModel->getFuzzyBooks($request->fuzzyword);

        //おすすめ表示
    	foreach ($datas as $data) {	
	        $titletagRecomend = $searchModel->getTitletagBooks($data->titletag, $data->id); 
	        $genreRecomend = $searchModel->getGenreBooks($data->smallgenre, $data->id); 
    	} 

    	return view('search.recommend')->with(['titletagrecomend'=>$titletagRecomend, 'genrerecomend'=>$genreRecomend, 'result'=>$datas]);
    }

}

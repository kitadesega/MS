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
//        ジャンル一覧
        $largegenres = $booksModel->getLargegenreList();
        $smallgenres = $booksModel->getSmallgenreList();
        //リクエスト
        $largegenre = $request->input('largegenre');
        $smallgenre = $request->input('smallgenre');

        $keyword = $request->input('keyword');
        $options = $request->input('options');
        switch ($options){
            case 'title':
                $searchType = "タイトル";
                break;
            case 'auther':
                $searchType = "著者";
                break;
            case 'detail':
                $searchType = "概要";
                break;
            default:
                $searchType = "タイトル";
                break;
        }
        $books = $searchModel->searchBooks($keyword,$largegenre,$smallgenre,$options);
        if($largegenre == ""){
            $largegenre = "指定無し";
        }

        if($smallgenre == ""){
            $smallgenre = "指定無し";
        }

        if($keyword == ""){
            $keyword = "指定無し";
        }
        return view('search.result', [
            'result'=>$books,
            'largegenres' => $largegenres,
            'smallgenres' => $smallgenres,
            'largegenre' => $largegenre,
            'smallgenre' => $smallgenre,
            'keyword' => $keyword,
            'searchType' => $searchType

            ]);
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

<?php

namespace App\Http\Controllers;

use App\Models\SearchModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    public function test(){
    	return view('search.test');
    }

    public function allSelect(Request $request){
    	//$data = DB::select('select * from books where detail LIKE "%' . $request->result . '%"');
    	//$data = DB::select('select * from books');
    	$searchModel = new SearchModel();
   
    	$data = $searchModel->getBooks();
    	return view('search.selecttest', ['result'=>$data]);
    }

    public function titleSelect(Request $request){
        $searchModel = new SearchModel();
   
        $data = $searchModel->getTitleBooks($request->titleword);
        return view('search.selecttest', ['result'=>$data]);
    }

    public function fuzzySelect(Request $request){
    	$searchModel = new SearchModel();
   
    	$data = $searchModel->getFuzzyBooks($request->fuzzyword);
    	return view('search.selecttest', ['result'=>$data]);
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

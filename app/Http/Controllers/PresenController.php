<?php

namespace App\Http\Controllers;

use App\Models\NaturalLanguageModel;
use Illuminate\Http\Request;

class PresenController extends Controller
{
    //
    public function index(){

        return view('rental.p_return_complete');
    }

    public function score(Request $request){
        $apiModel = new NaturalLanguageModel();
        $apiArray = $apiModel->ApiTest($request->Impressions);
        return view('review.p_review_complete',[
            'score' => $apiArray[0],
            'magnitude' => $apiArray[1]
        ]);
    }
}

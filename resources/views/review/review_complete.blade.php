@extends('layouts.app')

@section('content')

    <div class="midashi-h">
        <p>感想を登録しました</p>
        <div></div>
    </div>

    <div class="card-syousai">
        <div class="row m-3">

            <div class="col-8">
                <p class="kansou-txt">感想スコア</p>
                <div style="height: 30px; width: 100%; background: #fee47f;"><div style="height: 30px; width: 70%; background: red;"></div></div>
                <p class="score-txt">今回のスコアは{{ $score }}です。</p>
                <p class="score-txt">スコアが少し低いのでこの本は合わなかったかもしれないですね。</p>
            </div>
        </div>
    </div>
@endsection



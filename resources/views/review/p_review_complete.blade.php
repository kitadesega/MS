@extends('layouts.app')

@section('content')
    <div class="card-syousai" style="width:800px">
        <div class="row m-3">

            <div class="col-8">
                <p class="kansou-txt">感想スコア</p>
                <div style="height: 30px; width: 100%; background: #fee47f;"><div style="height: 30px; width: 70%; background: red;"></div></div>
                <p class="score-txt">スコア:{{ $score }}</p>
                <p class="score-txt">マグニチュード:{{ $magnitude }}</p>

                <table border="1">
                    <tr>
                        <th>感情</th>
                        <th>サンプル値</th>
                    </tr>
                    <tr>
                        <td>明らかにポジティブ*</td>
                        <td>"score": 0.8、"magnitude": 3.0</td>
                    </tr>
                    <tr>
                        <td>明らかにネガティブ*</td>
                        <td>"score": -0.6、"magnitude": 4.0</td>
                    </tr>
                    <tr>
                        <td>ニュートラル</td>
                        <td>"score": 0.1、"magnitude": 0.0</td>
                    </tr>
                    <tr>
                        <td>混合</td>
                        <td>"score": 0.0、"magnitude": 4.0</td>
                    </tr>
                </table>
            </div>

        </div>

    </div>
@endsection



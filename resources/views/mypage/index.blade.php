@extends('layouts.app')
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
@section('content')


        <div class="top-rireki">
            <h1>データ</h1>
            <img style="width:1000px;margin-left:0px"src="{{ asset('image/'.'load.gif') }}" >
                <canvas id="myLineChart"></canvas>
                <div style="margin-left:80px;margin-top:-20px">

                    @foreach($history as $key=>$book)
                        @if ($loop->first)
                            <img style="width:50px;margin-left:0px"src="{{ asset('image/'.$book->image) }}" >
                        @elseif ($loop->last)
                            <img style="width:50px;margin-left:40px"src="{{ asset('image/'.$book->image) }}" >
                        @else
                            <img style="width:50px;margin-left:45px"src="{{ asset('image/'.$book->image) }}" >
                        @endif
                    @endforeach
                </div>
        </div>

        <div class="top-kisetsu">
            <h1>データからのおすすめ</h1>
                @foreach($books as $key => $book)
                    @if( $key%4 === 0)
                    <div class="osusume-block d-flex justify-content-between">
                        @endif
                        <div class="osusume">
                            <div class="osusume-img">
                                <img src="{{ asset('image/'.$book->image) }}">
                            </div>
                            <div class="osusume-kate">{{ $book->largegenre }}</div>
                            <div class="osusume-title1"></div>
                            <div class="osusume-title2">
                                <div class="hirano">
                                    <p>{{ $book->title }}</p>
                                </div>
                            </div>
                        </div>
                        @if( $key%4 === 3 || $book === end($books))
                    </div>
                        @endif
                @endforeach


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

        <script>
            var ctx = document.getElementById("myLineChart");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        @foreach($history as $value)
                        '',
                        @endforeach
                    ],
                    datasets: [

                        {
                            label: 'スコア',
                            data: [
                                @foreach($history as $value)
                                    '{{$value->score}}',
                                @endforeach
                            ],
                            lineTension: 0,
                            fill: false,
                            borderWidth: 3,
                            borderColor: "rgba(255,0,0,1)",
                            backgroundColor: "rgba(0,0,0,0)"
                        },

                        {{--{--}}
                        {{--    label: '重み',--}}
                        {{--    data: [--}}
                        {{--        @foreach($history as $value)--}}
                        {{--            '{{$value->magnitude}}',--}}
                        {{--        @endforeach--}}
                        {{--    ],--}}
                        {{--    borderColor: "rgba(0,0,255,1)",--}}
                        {{--    backgroundColor: "rgba(0,0,0,0)"--}}
                        {{--}--}}
                    ],
                },
                options: {
                    title: {
                        display: true,
                        text: 'あなたの感想のポジティブ度グラフ'
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                maxRotation: 90,
                                minRotation: 90,
                                callback: function(val){
                                    if(val.length > 10){
                                        return [val.substr(0, 10), val.substr(10)]
                                    }else{
                                        return val;
                                    }
                                }
                            }
                        }],

                        yAxes: [{
                            ticks: {
                                min: -1,
                                max: 1,
                                suggestedMax: 1,
                                suggestedMin: -1,
                                stepSize: 0.01,
                                callback: function(label, index, labels) {
                                    switch (label) {
                                        case 1:
                                            return 'ポジティブ';
                                        case 0.25:
                                            return '少しポジティブ';
                                        case 0:
                                            return '普通';
                                        case -0.25 :
                                            return '少しネガティブ';
                                        case  -1 :
                                            return 'ネガティブ';

                                    }
                                }
                            }
                        }]
                    },
                }
            });
        </script>

@endsection


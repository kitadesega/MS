<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script>
        // window.addEventListener('DOMContentLoaded', function () {
        //         var wDef = (navigator.browserLanguage || navigator.language || navigator.userLanguage).substr(0,2);
        //         console.log(wDef);
        //         langSet(wDef);
        // });

        // =========================================================
        //      選択された言語のみ表示
        // =========================================================
        function langSet(argLang){

            // --- 切り替え対象のclass一覧を取得 ----------------------
            var elm = document.getElementsByClassName("langCng");

            for (var i = 0; i < elm.length; i++) {

                // --- 選択された言語と一致は表示、その他は非表示 -------
                if(elm[i].getAttribute("lang") == argLang){
                    elm[i].style.display = '';
                }
                else{
                    elm[i].style.display = 'none';
                }
            }
        }
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/hov.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <script type='text/javascript' src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/jquery.particleground.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset("js/bootstrap.js") }}"></script>
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('css/tien.css') }}">--}}



    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <style type="text/css">
        /* === ラジオボタンは非表示 ================== */
        #sample1 input[type="radio"]{
            display    : none;
        }

        /* === 各ラジオボタンのラベルをボタンに変更 == */
        #sample1 label{
            display    : inline-block;
            border     : 1px solid #ccc;
            box-shadow : 2px 2px #999;
            padding    : 2px 6px;
        }

        /* === 選択されている言語のラベル色を変更 ==== */
        #sample1 input[type="radio"]:checked + label {
            background : #ffa64d;
        }
    </style>
    <script type="text/javascript">
        $(function($) {
            var settings = {
                proximity: 110,
                parallaxMultiplier: 20,
                dotColor: "#FFE14E",
                lineColor: "#FFE14E",
                particleRadius: 10
            };
            $("#particles").particleground(settings);
        });
    </script>
    <style>
        button {
            background: none;
            border: none;
            outline: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;

        }
        button:focus {
            outline:0;
        }

        a {
            text-decoration: none;
            color : inherit;
        }

        a:hover {
            text-decoration: none;
            color : inherit;
        }
    </style>

</head>
<body>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<div id="particles"></div>
<div class="image-book"><img src="{{ asset('svg/book-svf.svg') }}"></div>
<header class="syoshi-menu">
    <div class="d-flex justify-content-end">
        <div class="daikei">
            <p>ホーム</p>

            <div class="daikei-bg">
            </div>
        </div>
        <div class="geNGO">
            <div id="sample1">
                <input type="radio" name="langKbn" id="sJa" onClick="langSet('ja')" checked>
                <label for="sJa">
                    <span class="langCng" lang="ja">日本語</span>
                    <span class="langCng" lang="en" style="display: none;">Japanese</span>
                </label>

                <input type="radio" name="langKbn" id="sEn" onClick="langSet('en')">
                <label for="sEn">
                    <span class="langCng" lang="ja">英語</span>
                    <span class="langCng" lang="en" style="display: none;">English</span>
                </label>

            </div>
            @guest
            <a class="log-btn" href="#modal-01">ログイン</a>
            @else
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <div class="dropdown open">
                    <ul class="dropdown-menu">
                        <li class="active"><a href="#">メニュー1</a></li>
                        <li><a href="#">メニュー2</a></li>
                        <li><a href="#">メニュー3</a></li>
                        <li role="separator" class="divider"></li><!-- 横仕切り線 -->
                        <li><a href="#">その他リンク</a></li>
                    </ul>
                </div><!-- /.dropdown -->
            @endguest
        </div>
    </div>
</header>
<div class="row">

    <aside>
        <div class="side-block">
            <a href="/">
                <div class="side">
                    <p>ホーム</p>
                    <div class="side-bg"></div>
                </div>
            </a>
            <a href="/mypage">
                <div class="side">
                    <p>マイページ</p>
                    <div class="side-bg"></div>
                </div>
            </a>
            <a href="#modal-search">
                <div class="side2 hov-anime-1">
                    <p>検索</p>
                    <img src="{{ asset('svg/kashidashi.svg') }}" stroke-width="4" fill="red;" >
                    <div class="side-cc"></div>
                </div>
            </a>
            <a href="#modal-kashidashi">
                <div class="side2 hov-anime-2">
                    <p>貸出</p>
                    <img src="{{ asset('svg/rentaru.svg') }}" >
                    <div class="side-dd"></div>
                </div>
            </a>
            <a href="#modal-henkyaku">
{{--            <a href="/rental/returnBookInput">--}}
                <div class="side2 hov-anime-3">
                    <p>返却</p>
                    <img src="{{ asset('svg/henkyaku.svg') }}" stroke-width="4">
                    <div class="side-ee"></div>
                </div>
            </a>
        </div>
    </aside>
    <article>
        <div class="container-fluid">
            @yield('content')
        </div>
    </article>
    <!--  ログインモーダル  -->
    <div class="modal-wrapper" id="modal-01">
        <a href="#!" class="modal-overlay"></a>
        <div class="modal-window">
            <div class="modal-content">
                <div class="space">
                    <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ログイン') }}
                                </button>

                                <a href="/barcodeLogin" class="btn btn-dark" style="color:white">
                                    バーコードでログイン
                                </a>

                            </div>
                        </div>
                    </form>
                    </div>
                </div>
{{--                <a class="btn btn-primary" href="" role="button">ログイン</a>--}}

            </div>
            <a href="#!" class="modal-close">×</a>
        </div>
    </div>
{{--    <div class="modal-wrapper" id="modal-kashidashi">--}}
{{--        <a href="#!" class="modal-overlay"></a>--}}
{{--        <div class="mo-pos">--}}
{{--            <div class="modal-window">--}}
{{--                <div class="taitoru">--}}
{{--                    <p>貸出フォーム</p>--}}
{{--                    <div class="taitoru-bg"></div>--}}
{{--                </div>--}}
{{--                <div class="modal-bg">--}}
{{--                    <div class="modal-bg2"></div>--}}
{{--                </div>--}}
{{--                <div class="modal-content">--}}
{{--                    <form action="/rental/rent" method="post">--}}
{{--                    <div class="container-fluid log-cm">--}}
{{--                        <div class="row justify-content-cente">--}}
{{--                            <div class="col-6" id="rentalBook">--}}
{{--                                <div class="row justify-content-end miii-hen">--}}
{{--                                    <div class="col-9">--}}
{{--                                        <p class="hen-pos">バーコードのスキャンもしくは入力してください</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row justify-content-end">--}}
{{--                                    <div class="col-9">--}}
{{--                                        <p class="kensaku-ma"></p>--}}
{{--                                        <input type="text" id="rentalBookBarcode" class="form-control" style="height:45px;">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                                @csrf--}}
{{--                                <input type="date" name="returnDate" min="{{ date("Y-m-d") }}"></input>--}}
{{--                                <input type="hidden" name="rentalBookId" id="rentalBookId"value="">--}}

{{--                            <div class="col-1"></div>--}}
{{--                            <div class="col-3">--}}
{{--                                <button type="submit"class="kensaku-bu btn-warning">実行</button>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- 最新の貸出フォーム -->

    <div class="modal-wrapper" id="modal-kashidashi">
        <a href="#!" class="modal-overlay"></a>
        <div class="mo-pos">
            <div class="modal-window">
                <div class="taitoru">
                    <p>貸出フォーム</p>
                    <div class="taitoru-bg"></div>
                </div>
                <div class="modal-bg">
                    <div class="modal-bg2"></div>
                </div>
                <div class="modal-content">
                    <div class="container-fluid log-cm">
                        <div class="row justify-content-cente">
                            <div class="col-6">
                                <div class="row justify-content-end miii-hen">
                                    <div class="col-9">
                                        <p class="hen-pos">バーコードをスキャンしてください</p>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-9">
                                        <p class="kensaku-ma"></p>
                                        <input type="text" id="rentalBookBarcode" class="form-control" style="height:45px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4" id="rentalBook">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 最新の貸出フォーム -->
    <div class="modal-wrapper" id="modal-henkyaku">
        <a href="#!" class="modal-overlay"></a>
        <div class="mo-pos">
            <div class="modal-window">
                <div class="taitoru">
                    <p>返却フォーム</p>
                    <div class="taitoru-bg"></div>
                </div>
                <div class="modal-bg">
                    <div class="modal-bg2"></div>
                </div>
                <div class="modal-content">
                    <div class="container-fluid log-cm">
                        <div class="row justify-content-cente">
                            <div class="col-6">
                                <div class="row justify-content-end miii-hen">
                                    <div class="col-9">
                                        <p class="hen-pos">バーコードをスキャンしてください</p>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-9">
                                        <p class="kensaku-ma"></p>
                                        <input type="text" id="returnBookBarcode" class="form-control" style="height:45px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4" id="returnBook">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-wrapper" id="modal-search">
        <a href="#!" class="modal-overlay"></a>
        <div class="mo-pos">
            <div class="modal-window">
                <div class="taitoru">
                    <p>検索フォーム</p>
                    <div class="taitoru-bg"></div>
                </div>
                <div class="modal-bg">
                    <div class="modal-bg2"></div>
                </div>
                <div class="modal-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-9">
                                <form action="/search/books" method="post" accept-charset="utf-8">
                                    <div class="row miii">
                                        <div class="col-7">
                                            <p class="kensaku-ma">キーワード</p>
                                            {{ csrf_field() }}
                                            <input type="text" id="text1" name="keyword" class="form-control" style="height:45px;">
                                        </div>
                                        <div class="col-5">
                                            <p class="kensaku-ma">検索項目</p>
                                            <div class="btn-group btn-group-toggle d-flex justify-content-end" data-toggle="buttons" style="height:45px;">
                                                <label class="btn btn-light active">
                                                    <input type="radio" name="options" id="option1" value="title" autocomplete="off" checked>タイトル
                                                </label>
                                                <label class="btn btn-light">
                                                    <input type="radio" name="options" id="option2" value="auther" autocomplete="off">著者
                                                </label>
                                                <label class="btn btn-light">
                                                    <input type="radio" name="options" id="option3" value="detail"autocomplete="off">概要
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="kensaku-ma">大ジャンル</p>
                                            <select class="form-control" style="height: 45px;" name="largegenre">
                                                <option value="">--指定なし--</option>
                                                <option value="アート・教養・エンタメ">アート・教養・エンタメ</option>
                                                <option value="事典・図鑑・語学・辞書">事典・図鑑・語学・辞書</option>
                                                <option value="実用・教育">実用・教育</option>
                                                <option value="文学・小説">文学・小説</option>
                                                <option value="文学・小説・文庫">文学・小説・文庫</option>
                                                <option value="文学・評論">文学・評論</option>
                                                <option value="旅行・地図">旅行・地図</option>
                                                <option value="歴史・地理">歴史・地理</option>
                                                <option value="社会・ビジネス">社会・ビジネス</option>
                                                <option value="科学・テクノロジー">科学・テクノロジー</option>
                                                <option value="趣味">趣味</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <p class="kensaku-ma">小ジャンル</p>
                                            <select class="form-control" style="height: 45px;" name="smallgenre">
                                                <option value="">--指定なし--</option>
                                                <option value="SF・ディストピア">SF・ディストピア</option>
                                                <option value="SF・ホラー・ファンタジー">SF・ホラー・ファンタジー</option>
                                                <option value="エッセー">エッセー</option>
                                                <option value="サイエンス・ミステリ">サイエンス・ミステリ</option>
                                                <option value="サスペンス">サスペンス</option>
                                                <option value="ノンフィクション">ノンフィクション</option>
                                                <option value="ノンフィクション・エッセイ・評論">ノンフィクション・エッセイ・評論</option>
                                                <option value="ノンフィクション・伝記">ノンフィクション・伝記</option>
                                                <option value="パレスチナ問題">パレスチナ問題</option>
                                                <option value="ビジネス">ビジネス</option>
                                                <option value="フォトエッセイ">フォトエッセイ</option>
                                                <option value="ホラー">ホラー</option>
                                                <option value="ミステリ・サスペンス">ミステリ・サスペンス</option>
                                                <option value="世界史">世界史</option>
                                                <option value="伝記">伝記</option>
                                                <option value="健康法">健康法</option>
                                                <option value="動物学">動物学</option>
                                                <option value="化学">化学</option>
                                                <option value="医学エッセイ">医学エッセイ</option>
                                                <option value="友情">友情</option>
                                                <option value="古事記">古事記</option>
                                                <option value="国内旅行">国内旅行</option>
                                                <option value="地図">地図</option>
                                                <option value="地理・地域研究">地理・地域研究</option>
                                                <option value="外国文学研究">外国文学研究</option>
                                                <option value="天文学">天文学</option>
                                                <option value="太平洋戦争">太平洋戦争</option>
                                                <option value="宇宙学">宇宙学</option>
                                                <option value="宇宙学・天文学">宇宙学・天文学</option>
                                                <option value="宇宙工学">宇宙工学</option>
                                                <option value="微生物学">微生物学</option>
                                                <option value="怪談・青春・ファンタジー">怪談・青春・ファンタジー</option>
                                                <option value="手芸・クラフト">手芸・クラフト</option>
                                                <option value="推理">推理</option>
                                                <option value="数学">数学</option>
                                                <option value="文芸">文芸</option>
                                                <option value="料理・グルメ">料理・グルメ</option>
                                                <option value="日本史">日本史</option>
                                                <option value="日本文学">日本文学</option>
                                                <option value="時事・社会">時事・社会</option>
                                                <option value="歴史・時代">歴史・時代</option>
                                                <option value="歴史学">歴史学</option>
                                                <option value="民俗学">民俗学</option>
                                                <option value="物理学">物理学</option>
                                                <option value="生物・バイオテクノロジー">生物・バイオテクノロジー</option>
                                                <option value="百科事典・図鑑">百科事典・図鑑</option>
                                                <option value="美術・工芸">美術・工芸</option>
                                                <option value="考古学">考古学</option>
                                                <option value="自伝">自伝</option>
                                                <option value="自然科学">自然科学</option>
                                                <option value="航空工学">航空工学</option>
                                                <option value="鉱石">鉱石</option>
                                                <option value="随筆">随筆</option>
                                                <option value="電気">電気</option>
                                                <option value="音楽">音楽</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="kensaku-bu btn-warning">検索</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type='text/javascript' src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset("js/bootstrap.min.js") }}"></script>

<script type="text/javascript">
    $('.bs-component [data-toggle="popover"]').popover();
    $('.bs-component [data-toggle="tooltip"]').tooltip();
</script>
    <script>
        $(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            /* Ajax通信開始 */

            $('#rentalBookBarcode').on('change', function () {
                console.log('動作確認');
                var request = $.ajax({
                    type: 'POST',
                    data: {
                        bookBarcode: $('#rentalBookBarcode').val()
                    },
                    url: '/ajaxBookSearch',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    cache: false,
                    dataType: 'json',
                    timeout: 3000
                });

                /* 成功時 */
                request.done(function (data) {
                    console.log(data);
                    $('#rentalBook').empty();
                    $('#rentalBookBarcode').val('');
                    $('#rentalBookId').val(data.id);
                    if (Object.keys(data).length) {
                        if(data.rental_flag == 1){
                            $('#rentalBook').append(
                                '<div class="col-sm-6 col-md-4">' +
                                '<a href="#" class="card">' +
                                '<img class="card-img" src="{{ asset('') }}image/' + data.image + '" alt="...">' +
                                '</a>' +
                                '<div class="card-body">' +
                                '<h5 class="card-title">' + data.title + '</h5>' +
                                '<h2>貸出中です</h2>' +
                                '<a href="#" class="btn btn-danger">返却日:'+ data.returnDay +'</a>' +
                                '</div>' +
                                '</div>'
                            );
                        }else {
                            $('#rentalBook').append(
                                '<div class="row">' +
                                '<div class="col-5">' +
                                '<p class="book-finish"><img src="{{ asset('') }}image/' + data.image + '"></p>' +
                                '</div>' +
                                '<div class="col-7">' +
                                '<p class="book-finish-title">' + data.title + '</p>' +
                                '<p class="hen-pos-2">日付選択</p>' +
                                '<form action="/rental/rent" method="post">@csrf' +
                                '<input type="date" name="rentalReturnDate" min="{{ date("Y-m-d") }}" style="height:45px;"></input>' +
                                '<input type="hidden" name="rentalBookId" value="' + data.id + '">' +
                                '<button type="submit" class="btn kashidashi-bu btn-warning">貸出する</button>' +
                                '</form>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                    }else{
                        $('#rentalBook').append('<h1>存在しません</h1>');
                    }

                });


            });
        });

        $(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            /* Ajax通信開始 */

            $('#returnBookBarcode').on('change', function () {
// console.log(toHalfWidth($('#bookBarcode').val()));
                var request = $.ajax({
                    type: 'POST',
                    data: {
                        bookBarcode: $('#returnBookBarcode').val()
                    },
                    url: '/ajaxBookSearch',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    cache: false,
                    dataType: 'json',
                    timeout: 3000
                });

                /* 成功時 */
                request.done(function (data) {
                    console.log(data);
                    $('#returnBook').empty();
                    $('#returnBookBarcode').val('');
                    $('#returnBookId').val(data.id);
                    if (Object.keys(data).length) {
                        $('#returnBook').append(
                            '<div class="row">' +
                            '<div class="col-5">' +
                            '<p class="book-finish"><img src="{{ asset('') }}image/' + data.image + '"></p>' +
                            '</div>' +
                            '<div class="col-7">' +
                            '<p class="book-finish-title">' + data.title + '</p>' +
                            '<form action="/rental/returnBook" method="post">@csrf' +
                            '<input type="hidden" name="returnBookId" value="' + data.id + '">' +
                            '<button type="submit" class="btn kashidashi-bu btn-warning">返却する</button>' +
                            '</form>' +
                            '</div>' +
                            '</div>'
                        );
                    }else{
                        $('#returnBook').append('<h1>存在しません</h1>');
                    }

                });

                /* 失敗時 */
                // request.fail(function () {
                //     alert("通信に失敗しました");
                // });

            });
        });

        function toHalfWidth(strVal){
            // 半角変換
            var halfVal = strVal.replace(/[！-～]/g,
                function( tmpStr ) {
                    // 文字コードをシフト
                    return String.fromCharCode( tmpStr.charCodeAt(0) - 0xFEE0 );
                }
            );

            // 文字コードシフトで対応できない文字の変換
            return halfVal.replace(/”/g, "\"")
                .replace(/’/g, "'")
                .replace(/‘/g, "`")
                .replace(/￥/g, "\\")
                .replace(/　/g, " ")
                .replace(/〜/g, "~");
        }
        function myFnc(){
            $('input:visible').eq(0).focus();
        }
    </script>
</body>
</html>

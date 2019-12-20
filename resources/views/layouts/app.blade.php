<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
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
            <a href="/search">
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
                <div class="side2 hov-anime-3">
                    <p>返却</p>
                    <img src="{{ asset('svg/henkyaku.svg') }}" stroke-width="4">
                    <div class="side-ee"></div>
                </div>
            </a>
{{--            <div class="side">--}}
{{--                <a href="/">--}}
{{--                    <p class="langCng" lang="ja">ホーム</p>--}}
{{--                    <p class="langCng" lang="en" style="display:none;">HOME</p>--}}
{{--                </a>--}}
{{--                <div class="side-bg"></div>--}}
{{--            </div>--}}
{{--            <div class="side">--}}
{{--                <a href="/mypage">--}}
{{--                    <p class="langCng" lang="ja">マイページ</p>--}}
{{--                    <p class="langCng" lang="en" style="display:none;">MYPAGE</p>--}}
{{--                </a>--}}
{{--                <div class="side-bg"></div>--}}
{{--            </div>--}}
{{--            <div class="side2 side-first">--}}
{{--                <a href="/search">--}}
{{--                    <p class="langCng" lang="ja">検索</p>--}}
{{--                    <p class="langCng" lang="en" style="display:none;">SEARCH</p>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="side2">--}}
{{--                <a href="/rental/rentBookInput">--}}
{{--                    <p class="langCng" lang="ja">貸出</p>--}}
{{--                    <p class="langCng" lang="en" style="display:none;">RENTAL</p>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="side2">--}}
{{--                <a href="/rental/returnBookInput">--}}
{{--                    <p class="langCng" lang="ja">返却</p>--}}
{{--                    <p class="langCng" lang="en" style="display:none;">RETURN</p>--}}
{{--                </a>--}}
{{--            </div>--}}
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


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="./js/bootstrap.min.js"></script>

<script type="text/javascript">
    $('.bs-component [data-toggle="popover"]').popover();
    $('.bs-component [data-toggle="tooltip"]').tooltip();
</script>
</body>
</html>

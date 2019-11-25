<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
        /*body {*/
        /*    margin: 50px;*/
        /*    text-align: center;*/
        /*    font-family: 'Open Sans', sans-serif;*/
        /*    background: #f2fbff;*/
        /*}*/
        h1 {
            font-size: 24px;
            margin-bottom: 25px;
            font-weight: bold;
            text-transform: uppercase;
        }


        .star-ratings-sprite {
            background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/2605/star-rating-sprite.png") repeat-x;
            font-size: 0;
            height: 21px;
            line-height: 0;
            overflow: hidden;
            text-indent: -999em;
            width: 110px;
            margin: 0 auto;
        }
        .star-ratings-sprite-rating {
            background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/2605/star-rating-sprite.png") repeat-x;
            background-position: 0 100%;
            float: left;
            height: 21px;
            display: block;
        }

        .box-read{
            overflow:hidden;
            text-overflow: ellipsis;
            white-space:nowrap;
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
{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    トップ--}}
{{--                </a>--}}
{{--                <a class="navbar-brand" href="/search/index">--}}
{{--                    検索--}}
{{--                </a>--}}
{{--                <a class="navbar-brand" href="/rental/rentBookInput">--}}
{{--                    レンタル--}}
{{--                </a>--}}
{{--                <a class="navbar-brand" href="/rental/returnBookInput">--}}
{{--                    返却--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav mr-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                @if (Route::has('register'))--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                @endif--}}
{{--                            </li>--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        <main class="py-4">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}

    <header class="d-flex justify-content-end">
        <div class="daikei">
            <a href="/"><p>ホーム<br>(ホームへ戻る)</p></a>
            <div class="daikei-bg"></div>
        </div>
        <div class="d-flex gengo">
            <div>一般</div>
            <div>かな</div>
            <div>English</div>
            <div>
                <a class="btn btn-primary" href="#modal-01" role="button">ログイン</a>
            </div>
        </div>
    </header>

    <div class="row">
        <aside class="col-2">
            <div class="side">
                <p>マイページ</p>
                <div class="side-bg"></div>
            </div>
            <div class="side">
                <a href="/rental/rentBookInput"><p>レンタル</p></a>
                <div class="side-bg"></div>
            </div>
            <div class="side">
                <a href="/rental/returnBookInput"><p>返却</p></a>
                <div class="side-bg"></div>
            </div>
            <div class="side">
                <p>利用登録申請</p>
                <div class="side-bg"></div>
            </div>
        </aside>
        <div class="col-10 p-3">
            @yield('content')
            </div>



            <!--  ログインモーダル  -->
            <div class="modal-wrapper" id="modal-01">
                <a href="#!" class="modal-overlay"></a>
                <div class="modal-window">
                    <div class="modal-content">
                        <div class="space">入力欄</div>
                        <a class="btn btn-primary" href="" role="button">ログイン</a>
                    </div>
                    <a href="#!" class="modal-close">×</a>
                </div>
            </div>



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

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="https://calil.jp/public/css/calilapi.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://calil.jp/public/js/calilapi.js"></script>
        <!-- Styles -->
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
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="panel panel-default">
                <table>
                    
                    @foreach($result as $result)
                        <tr>
                            <td>{{$result->id}}</td>
                            <td>{{$result->title}}</td>
                            <td>{{$result->detail}}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <th colspan="3">タイトルタグからのおすすめ</th>
                    </tr>

                    @if(count($titletagrecomend) > 0)
                        @foreach($titletagrecomend as $titletagrecomend)

                            <tr>
                                <td>{{$titletagrecomend->id}}</td>
                                <td>{{$titletagrecomend->title}}</td>
                                <td>{{$titletagrecomend->detail}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">存在しません</td>
                        </tr>
                    @endif

                    <tr>
                        <th colspan="3">少ジャンルからのおすすめ</th>
                    </tr>

                    @if(count($genrerecomend) > 0)
                        @foreach($genrerecomend as $genrerecomend)

                            <tr>
                                <td>{{$genrerecomend->id}}</td>
                                <td>{{$genrerecomend->title}}</td>
                                <td>{{$genrerecomend->detail}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">存在しません</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </body>
</html>

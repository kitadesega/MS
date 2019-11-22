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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-body">テスト</div>
{{--                        <form action="/search/allSelect" method="post" accept-charset="utf-8">--}}
{{--                            {{ csrf_field() }}--}}
{{--                            <button type="submit" class="btn btn-primary">全件検索</button>--}}
{{--                        </form>--}}

{{--                        <hr />--}}

                        <form action="/search/titleSelect" method="post" accept-charset="utf-8">
                            {{ csrf_field() }}
                            <p>タイトル検索</p>
                            <input type="text" name="titleword" value="" placeholder="">
                            <button type="submit" class="btn btn-primary">検索</button>
                        </form>

{{--                        <hr />--}}

{{--                        <form action="/search/fuzzySelect" method="post" accept-charset="utf-8">--}}
{{--                            {{ csrf_field() }}--}}
{{--                            <p>概要あいまい検索</p>--}}
{{--                            <input type="text" name="fuzzyword" value="" placeholder="">--}}
{{--                            <button type="submit" class="btn btn-primary">検索</button>--}}
{{--                        </form>--}}

{{--                        <hr />--}}

{{--                        <form action="/search/genreSelect" method="post" accept-charset="utf-8">--}}
{{--                            {{ csrf_field() }}--}}
{{--                            <input type="text" name="fuzzyword" value="" placeholder="">--}}
{{--                            <button type="submit" class="btn btn-primary">おすすめ表示(検索は概要で)</button>--}}
{{--                        </form>--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


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

        <div class="col-10 p-3">
            <form action="/search/books" method="post" accept-charset="utf-8">
            <h1>キーワード検索</h1>
            <div class="karikensaku">
                    {{ csrf_field() }}
                    <p>タイトル検索</p>
                    <input type="text" name="titleword" value="" placeholder="">
                    <button type="submit">検索</button>

            </div>

            <h2>詳細検索</h2>
            <div class="more-search d-flex">
                <div>
                    <h4>大ジャンル</h4>
                    <select class="form-control" name="largegenre">
                        <option value="">--指定なし--</option>
                        @foreach($largegenres as $largegenre)
                            <option value="{{ $largegenre->largegenre }}">{{ $largegenre->largegenre }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <h4>小ジャンル</h4>
                    <select class="form-control" name="smallgenre">
                        <option value="">--指定なし--</option>
                        @foreach($smallgenres as $smallgenre)
                            <option value="{{ $smallgenre->smallgenre }}">{{ $smallgenre->smallgenre }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <h4>感想の傾向</h4>
                    <select class="form-control" name="emotion">
                        <option>--指定なし--</option>
                        <option value="5">とてもポジティブ</option>
                        <option value="4">ポジティブ</option>
                        <option value="3">ニュートラル</option>
                        <option value="2">ネガティブ</option>
                        <option value="1">とてもネガティブ</option>
                    </select>
                </div>
            </div>
            </form>

            <h1>おすすめ</h1>

            <div class="se-card">
                <div class="se-card-top">
                    <a href="ms-search-details.html"></a>
                    <div class="se-block-w"></div>
                    <div class="se-block-g"></div>
                    <div class="se-pic"></div>
                    <div class="se-kate">ジャンル</div>
                    <div class="se-text-block">
                        <div class="se-ti">
                            <p>タイトル、著者、出版社、出版年数、レビュー（件数）</p>
                        </div>
                    </div>
                </div>
                <a href="ms-search-details.html"a></a>
            </div>
@endsection


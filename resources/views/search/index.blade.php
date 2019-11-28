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
    <div class="row">

        <div class="col-10 p-3">

            <h1>キーワード検索</h1>
            <div class="karikensaku">
                <form action="/search/titleSelect" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    <p>タイトル検索</p>
                    <input type="text" name="titleword" value="" placeholder="">
                    <button type="submit">検索</button>
                </form>
            </div>

            <h2>詳細検索</h2>
            <div class="more-search d-flex">
                <div>
                    <h4>大ジャンル</h4>
                    <select  class="search-select">
                        <option>1</option>
                    </select>
                </div>
                <div>
                    <h4>小ジャンル</h4>
                    <select  class="search-select">
                        <option>1</option>
                    </select>
                </div>
                <div>
                    <h4>出版年数</h4>
                    <select class="search-select">
                        <option>1</option>
                    </select>
                </div>
            </div>

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


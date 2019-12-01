@extends('layouts.app')
@section('content')
    <div class="container">
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
        @foreach($result as $key => $book)
        @if( $key%5 === 0)
         <div class="row justify-content-between m-0">
        @endif

            <div class="col-2 p-0" id="column1">
                <a href="/book/show/{{ $book->id }}" class="card">
                    <div class="card w-100 shadow p-2" style="border-style: none;">
                        <img class="card-img-top" src="{{ asset('image/'.$book->image) }}" alt="Card image cap">
                        <div class="card-body p-0 title1">
                            <span class="badge badge-pill badge-primary my-2">{{ $book->smallgenre }}</span>
                            <h6 class="m-0"><div class="box-read">{{ $book->title }}</div></h6>
                        </div>
                    </div>
                </a>
            </div>
        @if( $key%5 === 4)
                </div>
        @endif
        @endforeach

    </div>


@endsection

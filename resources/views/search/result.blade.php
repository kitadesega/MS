@extends('layouts.app')
@section('content')
    <article>
    <div class="container-fluid result">
        <div class="midashi-h">
            <p>検索結果</p>
            <div></div>
        </div>
        @foreach($result as $key => $book)
            <div class="se-card">
                <div class="se-card-top">
                    <a  href="/book/show/{{ $book->id }}"></a>
                    <div class="se-block-w"></div>
                    <div class="se-block-g"></div>
                    @if(!$book->rental_flag)
                        <div class="se-rental kanou">
                            <div class="se-rental-text">貸出可能</div>
                        </div>
                    @else
                        <div class="se-rental hukanou">
                            <div class="se-rental-text">貸出中</div>
                        </div>
                    @endif
                    <div class="se-pic">
                        <img src="{{ asset('image/'.$book->image) }}">
                    </div>
                    <div class="se-kate">{{ $book->largegenre }}</div>
                    <div class="se-text-block">
                        <div class="se-ti">
                            <h3>{{ $book->title }}</h3>
                            <h5>{{ $book->auther }}</h5>
                            <div class="se-read">
                                <p>
                                    {{ $book->detail }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/book/show/{{ $book->id }}"></a>
            </div>
        @endforeach
    </div>
    </article>

    <a href="#modal-search" style="color: #fcfcfc;">
        <div class="search-op">
            <div class="search-block">
                <div class="search-mi">
                    <div class="search-mi-bg"></div>
                </div>
                <p>検索設定</p>
            </div>
            <div class="search-ward">
                <p>キーワード</p>
                <p class="ward">{{ $keyword }}</p>
                <p>検索項目</p>
                <p class="ward">{{ $searchType }}</p>
                <p>大ジャンル</p>
                <p class="ward">{{ $largegenre }}</p>
                <p>小ジャンル</p>
                <p class="ward">{{ $smallgenre }}</p>
            </div>
        </div>
    </a>

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
                                            @foreach($largegenres as $largegenre)
                                                <option value="{{ $largegenre->largegenre }}">{{ $largegenre->largegenre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <p class="kensaku-ma">小ジャンル</p>
                                        <select class="form-control" style="height: 45px;" name="smallgenre">
                                            <option value="">--指定なし--</option>
                                            @foreach($smallgenres as $smallgenre)
                                                <option value="{{ $smallgenre->smallgenre }}">{{ $smallgenre->smallgenre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
{{--                                        <p class="kensaku-ma">出版年数</p>--}}
{{--                                        <select class="form-control" style="height: 45px;">--}}
{{--                                            <option>1</option>--}}
{{--                                            <option>2</option>--}}
{{--                                            <option>3</option>--}}
{{--                                        </select>--}}
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript">
        $('#box').animate({
            'marginLeft': '500px'
        });
        $(function () {
            $('#shi-1').click(function () {
                $('#syoshi-box').show();
            });
        });

    </script>

    <script type="text/javascript">
        $('.bs-component [data-toggle="popover"]').popover();
        $('.bs-component [data-toggle="tooltip"]').tooltip();
    </script>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container-fluid result">
    <h1>検索結果</h1>
    @foreach($result as $key => $book)
    <div class="se-card">
        <div class="se-card-top">
            <a href="/book/show/{{ $book->id }}"></a>
            <div class="se-block-w"></div>
            <div class="se-block-g"></div>
            <div class="se-pic">
                <img src="{{ asset('image/'.$book->image) }}">
            </div>
            <div class="se-kate">{{ $book->largegenre }}</div>
            <div class="se-text-block">
                <div class="se-ti">
                    <h3>{{ $book->title }}</h3>
                    <h5>{{ $book->auther }}</h5>
                    <h5>
                        @if(!$book->rental_flag)
                            貸出可●
                        @else
                            貸出中
                        @endif
                    </h5>
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


    <a href="#modal-search">
        <div class="search-op">
            <h1>検索設定</h1>
            <p>キーワード</p>
            <h4>{{ $keyword }}</h4>
            <p>大ジャンル</p>
            <h4>{{ $largegenre }}</h4>
            <p>小ジャンル</p>
            <h4>{{ $smallgenre }}</h4>
        </div>
    </a>

    </div>


    <!--  ログインモーダル  -->
    <div class="modal-wrapper" id="modal-login">
        <a href="#!" class="modal-overlay"></a>
        <div class="mo-pos">
            <div class="modal-window">
                <div class="modal-content">
                    <h2>ログインフォーム</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-wrapper" id="modal-search">
        <a href="#!" class="modal-overlay"></a>
        <div class="mo-pos">
            <div class="modal-window">
                <div class="modal-content">
                    <h2>検索フォーム</h2>
                    <div class="form-group">
                        <label for="text1">キーワード</label>
                        <input type="text" id="text1" class="form-control">
                    </div>
                    <a class="btn btn-primary" href="" role="button">検索する</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-wrapper" id="modal-kashidashi">
        <a href="#!" class="modal-overlay"></a>
        <div class="mo-pos">
            <div class="modal-window">
                <div class="modal-content">
                    <h2>貸出フォーム</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-wrapper" id="modal-henkyaku">
        <a href="#!" class="modal-overlay"></a>
        <div class="mo-pos">
            <div class="modal-window">
                <div class="modal-content">
                    <h2>返却フォーム</h2>
                </div>
            </div>
        </div>
    </div>

{{--        @foreach($result as $key => $book)--}}
{{--        @if( $key%5 === 0)--}}
{{--         <div class="row justify-content-between m-0">--}}
{{--        @endif--}}

{{--            <div class="col-2 p-0" id="column1">--}}
{{--                <a href="/book/show/{{ $book->id }}" class="card">--}}
{{--                    <div class="card w-100 shadow p-2" style="border-style: none;">--}}
{{--                        <img class="card-img-top" src="{{ asset('image/'.$book->image) }}" alt="Card image cap">--}}
{{--                        <div class="card-body p-0 title1">--}}
{{--                            <span class="badge badge-pill badge-primary my-2">{{ $book->smallgenre }}</span>--}}
{{--                            <h6 class="m-0"><div class="box-read">{{ $book->title }}</div></h6>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        @if( $key%5 === 4)--}}
{{--                </div>--}}
{{--        @endif--}}
{{--        @endforeach--}}

    </div>

@endsection

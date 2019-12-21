@extends('layouts.app')

@section('content')
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">返却が完了しました</div>--}}

{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <h1>貸出履歴からのあなたへのおすすめ</h1>--}}
{{--                        </div>--}}
{{--                        <div class="row justify-content-between m-0">--}}

{{--                            @foreach($rentalRecommendedBooks as $book)--}}
{{--                            <div class="col-2 p-0" id="column1">--}}
{{--                                <div class="card w-100 shadow p-2" style="border-style: none;">--}}
{{--                                    <img class="card-img-top" src="{{ asset('image/'.$book->image) }}" alt="Card image cap">--}}
{{--                                    <div class="card-body p-0 title1">--}}
{{--                                        <span class="badge badge-pill badge-primary my-2">{{ $book->smallgenre }}</span>--}}
{{--                                        <h6 class="m-0"><div class="box-read">{{ $book->title }}</div></h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}


{{--                        </div>--}}
{{--                        <form action="/review"method="post">--}}
{{--                            @csrf--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="textarea1">感想を書く</label>--}}
{{--                                <textarea name="Impressions" placeholder="気に入ったこと/気に入らなかったことは何ですか？この本で感じたことはなんですか？？" id="textarea1" class="form-control"></textarea>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <button type="submit" class="btn btn-primary mb-2">投稿する</button>--}}
{{--                            </div>--}}
{{--                            <input type="hidden" name="bookId" value="{{$bookId}}">--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



<div class="midashi-h">
    <p>返却完了しました</p>
    <div></div>
</div>

<div class="card-syousai">
    <div class="row m-3">
        <div class="col-5" id="column1">
            <p style="max-width:300px; margin:0 auto;" >
                <img src="{{ asset('image/'.$book->image) }}">
            </p>
        </div>

        <div class="col-7" id="column2">
        <form action="/review"method="post">
            @csrf
            <p class="kansou-txt">感想を書く</p>
            <div class="kansou-area">
                <textarea name="Impressions" id="textarea1" class="form-control" style="height:300px;"></textarea>
            </div>
            <p class="henkyaku-bu">
                <button type="submit" class="btn btn-primary btn-lg btn-block">送信</button>
            </p>
            <input type="hidden" name="bookId" value="{{ $book->id }}">
        </form>
        </div>
    </div>
</div>



<div class="top-rireki">
    <div class="midashi-h">
        <p>履歴からおすすめ</p>
        <div></div>
    </div>

    <div class="osusume-block d-flex justify-content-between">
        @foreach($rentalRecommendedBooks as $book)
            <a href="/book/show/{{ $book->id }}">
                <div class="osusume">
                    <div class="osusume-img">
                        <img src="{{ asset('image/'.$book->image) }}">
                    </div>
                    <div class="osusume-kate">{{ $book->smallgenre }}</div>
                    <div class="osusume-title1"></div>
                    <div class="osusume-title2">
                        <div class="hirano">
                            <p>{{ $book->title }}</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

</div>

</div>
</article>


@endsection

<script>
    function starBrighten(starNumber){

        for (  var i = 1;  i <= starNumber;  i++  ) {
            $('#star_'+i).html('<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMzgiIGhlaWdodD0iMzUiPjxkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD0iYSIgeDE9IjUwJSIgeDI9IjUwJSIgeTE9IjI3LjY1JSIgeTI9IjEwMCUiPjxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNGRkNFMDAiLz48c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNGRkE3MDAiLz48L2xpbmVhckdyYWRpZW50PjxwYXRoIGlkPSJiIiBkPSJNMTkgMGwtNS44NyAxMS41MkwwIDEzLjM3bDkuNSA4Ljk3TDcuMjYgMzUgMTkgMjkuMDIgMzAuNzUgMzVsLTIuMjQtMTIuNjYgOS41LTguOTctMTMuMTMtMS44NXoiLz48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48dXNlIGZpbGw9InVybCgjYSkiIHhsaW5rOmhyZWY9IiNiIi8+PHBhdGggc3Ryb2tlPSIjQTI2QTAwIiBzdHJva2Utb3BhY2l0eT0iLjc1IiBkPSJNMTkgMS4xbC01LjU0IDEwLjg4TDEuMSAxMy43Mmw4Ljk0IDguNDRMNy45MiAzNC4xIDE5IDI4LjQ2bDExLjA4IDUuNjQtMi4xMS0xMS45NCA4Ljk0LTguNDQtMTIuMzYtMS43NEwxOSAxLjF6Ii8+PC9nPjwvc3ZnPg==" >')
        }
        for (  var i = starNumber+1;  i <= 5;  i++  ) {
            $('#star_'+i).html('<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMzgiIGhlaWdodD0iMzUiPjxkZWZzPjxwYXRoIGlkPSJhIiBkPSJNMTkgMGwtNS44NyAxMS41MkwwIDEzLjM3bDkuNSA4Ljk3TDcuMjYgMzUgMTkgMjkuMDIgMzAuNzUgMzVsLTIuMjQtMTIuNjYgOS41LTguOTctMTMuMTMtMS44NXoiLz48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48dXNlIGZpbGw9IiNGRkYiIHhsaW5rOmhyZWY9IiNhIi8+PHBhdGggc3Ryb2tlPSIjQTI2QTAwIiBzdHJva2Utb3BhY2l0eT0iLjc1IiBkPSJNMTkgMS4xbC01LjU0IDEwLjg4TDEuMSAxMy43Mmw4Ljk0IDguNDRMNy45MiAzNC4xIDE5IDI4LjQ2bDExLjA4IDUuNjQtMi4xMS0xMS45NCA4Ljk0LTguNDQtMTIuMzYtMS43NEwxOSAxLjF6Ii8+PC9nPjwvc3ZnPg==">')
        }
        $('#starSelect').val(starNumber);

    }
</script>



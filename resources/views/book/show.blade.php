@extends('layouts.app')

@section('content')

<div class="container card mt-3">

    <div class="row m-3">

        <div class="col-6" id="column1">
            <p style="max-width:300px; margin:0 auto;" >
                <img src="{{ asset('image/'.$book->image) }}">
            </p>
        </div>

        <div class="col-6" id="column2">
{{--            <div class="mb-2">ホーム>大ジャンル>小ジャンル</div>--}}
            <h3>
                <p class="langCng" lang="ja">{{ $book->title }}</p>
                <p class="langCng" lang="en" style="display:none;">{{ $book->enTitle}}</p>
            </h3>
            <div class="row book-d">
                <div class="col-2 langCng" lang="ja">著者</div>
                <div class="col-2 langCng" lang="en" style="display:none;">Author</div>
                <div class="col-10 langCng" lang="ja">{{ $book->auther }}</div>
                <div class="col-10 langCng" lang="en" style="display:none;">{{ $book->enAuther }}</div>
            </div>
            <div class="row book-d">
                <div class="col-2 langCng" lang="ja">出版社</div>
                <div class="col-3 langCng" lang="en" style="display:none;">publisher</div>
                <div class="col-10 langCng" lang="ja">{{ $book->publisher }}</div>
                <div class="col-9 langCng" lang="en" style="display:none;">{{ $book->enPublisher }}</div>
            </div>

            <h4 class="mt-2 langCng" lang="ja">
                概要
            </h4>
            <h4 class="mt-2 langCng" lang="en" style="display:none;">
                summary
            </h4>
            <div id="langChenge">
            <div class="mb-3" >
                <p class="langCng" lang="ja">{{ $book->detail }}</p>
                <p class="langCng" lang="en" style="display:none;">{{ $book->enDetail }}</p>
            </div>

            </div>
            <div class="">
                <p class="langCng" lang="ja">
                    <button type="button" class="btn btn-warning btn-lg btn-block">印刷する</button>
                </p>
                <p class="langCng" lang="en" style="display:none;">
                    <button type="button" class="btn btn-warning btn-lg btn-block">Print</button>
                </p>
            </div>
            <a class="langCng" lang="ja" href="/">戻る</a>
            <a class="langCng" lang="en" style="display:none;" href="/">back</a>

        </div>
    </div>


</div>




<div class="container">

    <h4>おすすめ</h4>

    <div class="row justify-content-between m-0">

        <div class="col-2 p-0" id="column1">
            <div class="card w-100 shadow p-2" style="border-style: none;">
                <img class="card-img-top" src="images/tst.png" alt="Card image cap">
                <div class="card-body p-0 title1">
                    <span class="badge badge-pill badge-primary my-2">ジャンル1</span>
                    <h6 class="m-0">書籍タイトル1あああああああああああああああああ</h6>
                </div>
            </div>
        </div>

        <div class="col-2 p-0" id="column1">
            <div class="card w-100 shadow p-2" style="border-style: none;">
                <img class="card-img-top" src="images/tst.png" alt="Card image cap">
                <div class="card-body p-0 title1">
                    <span class="badge badge-pill badge-primary my-2">ジャンル1</span>
                    <h6 class="m-0">書籍タイトル2いいいいいいいいいいいいいいいいい</h6>
                </div>
            </div>
        </div>

        <div class="col-2 p-0" id="column1">
            <div class="card w-100 shadow p-2" style="border-style: none;">
                <img class="card-img-top" src="images/tst.png" alt="Card image cap">
                <div class="card-body p-0 title1">
                    <span class="badge badge-pill badge-primary my-2">ジャンル1</span>
                    <h6 class="m-0">書籍タイトル3ううううううううううううううううううううう</h6>
                </div>
            </div>
        </div>

        <div class="col-2 p-0" id="column1">
            <div class="card w-100 shadow p-2" style="border-style: none;">
                <img class="card-img-top" src="images/tst.png" alt="Card image cap">
                <div class="card-body p-0 title1">
                    <span class="badge badge-pill badge-primary my-2">ジャンル2</span>
                    <h6 class="m-0">書籍タイトル4ええええええええええええええええええ</h6>
                </div>
            </div>
        </div>

        <div class="col-2 p-0" id="column1">
            <div class="card w-100 shadow p-2" style="border-style: none;">
                <img class="card-img-top" src="images/tst.png" alt="Card image cap">
                <div class="card-body p-0 title1">
                    <span class="badge badge-pill badge-primary my-2">ジャンル3</span>
                    <h6 class="m-0">書籍タイトル5おおおおおおおおおおおおおおおおお</h6>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="./js/bootstrap.min.js"></script>

<script type="text/javascript">
    $('.bs-component [data-toggle="popover"]').popover();
    $('.bs-component [data-toggle="tooltip"]').tooltip();

    // =========================================================
    //      選択された言語のみ表示
    // =========================================================
    // function langSet(argLang){
    //
    //     // --- 切り替え対象のclass一覧を取得 ----------------------
    //     var elm = document.getElementsByClassName("langCng");
    //
    //     for (var i = 0; i < elm.length; i++) {
    //
    //         // --- 選択された言語と一致は表示、その他は非表示 -------
    //         if(elm[i].getAttribute("lang") == argLang){
    //             elm[i].style.display = '';
    //         }
    //         else{
    //             elm[i].style.display = 'none';
    //         }
    //     }
    // }
</script>


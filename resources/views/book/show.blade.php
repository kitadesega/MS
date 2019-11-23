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
            <div class="mb-2">ホーム>大ジャンル>小ジャンル</div>
            <h3>{{ $book->title }}</h3>
            <div class="row book-d">
                <div class="col-2">著者</div>
                <div class="col-10">{{ $book->auther }}</div>
            </div>
            <div class="row book-d">
                <div class="col-2">出版社</div>
                <div class="col-10">{{ $book->publisher }}</div>
            </div>
            <div class="row book-d">
                <div class="col-4">レビュー評価(平均)</div>
                <div class="col-7">
                    @if($book->starAvg)
                        <div class="star-ratings-sprite" style="display: inline-block">
                            <span style="width:{{ $book->starAvg }}%" class="star-ratings-sprite-rating"></span>
                        </div>
                        <span>({{ $book->reviewCount }})件</span>
                    @endif
                </div>
            </div>
            <h4 class="mt-2">内容説明</h4>
            <div class="mb-3">{{ $book->detail }}</div>
            <div class="">
                <p class="">
                    <button type="button" class="btn btn-warning btn-lg btn-block">印刷する</button>
                </p>
            </div>
            <a href="/">戻る</a>

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
</script>
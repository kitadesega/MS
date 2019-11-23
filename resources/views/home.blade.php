@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">全本</div>--}}

{{--                <div class="card-body">--}}

{{--                    <div class="row">--}}
{{--                        @foreach($books as $book)--}}
{{--                        <div class="col-sm-6 col-md-4">--}}
{{--                            <a href="/book/show/{{ $book->id }}" class="card">--}}
{{--                                <img class="card-img" src="{{ asset('image/'.$book->image) }}" alt="...">--}}
{{--                            </a>--}}
{{--                            <div class="card-body">--}}
{{--                                <h5 class="card-title">{{$book->title}}</h5>--}}
{{--                                --}}{{--   <p class="card-text"style="height: 100px;overflow: hidden; ">{{$book->detail}}</p>--}}
{{--                                @if($book->rental_flag)--}}
{{--                                    --}}{{--  貸出美:{{$book->startDay}}--}}
{{--                                    <a href="#" class="btn btn-danger">返却日:{{$book->returnDay}}</a>--}}
{{--                                @else--}}
{{--                                    <form action="/rental/rentConfirm" method="post">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="bookId" value="{{$book->id}}">--}}
{{--                                        <button type="submit" class="btn btn-primary">レンタル</button>--}}
{{--                                    </form>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            @if($book->starAvg)--}}
{{--                            <div class="star-ratings-sprite" style="display: inline-block">--}}
{{--                                <span style="width:{{ $book->starAvg }}%" class="star-ratings-sprite-rating"></span>--}}
{{--                            </div>--}}
{{--                                <span>({{ $book->reviewCount }})件</span>--}}

{{--                            @endif--}}
{{--                        </div>--}}
{{--                        @endforeach--}}

{{--                    </div>--}}
{{--                    <div class="d-flex justify-content-center">--}}
{{--                        {{ $books->links() }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="container">

    <h4 style="border-bottom: double 5px #FFC778;">貸出履歴からのおすすめ</h4>

    <div class="row justify-content-between m-0" style="padding-bottom:20px;">


        @foreach($rentalRecommendedBooks as $book)
            <div class="col-2 p-0" id="column1">
                <a href="/book/show/{{ $book->id }}" class="card">
                <div class="card w-100 shadow p-2" style="border-style: none;">
                    <img class="card-img-top" src="{{ asset('image/'.$book->image) }}" alt="Card image cap">
                    <div class="card-body p-0 title1">
                        <span class="badge badge-pill badge-primary my-2">{{ $book->smallgenre }}</span>
                        <h6 class="m-0"><div class="box-read">{{ $book->title }}</div></h6>
                    </div>
                    @if($book->starAvg)
                        <div class="star-ratings-sprite" style="display: inline-block">
                            <span style="width:{{ $book->starAvg }}%" class="star-ratings-sprite-rating"></span>
                        </div>
                        <div style="margin-left:80%">({{ $book->reviewCount }})件</div>
                    @endif
                </div>
                </a>

            </div>
        @endforeach



    </div>

    <h4 style="border-bottom: double 5px #FFC778;">あなたの趣向からのおすすめ</h4>

    <div class="row justify-content-between m-0">

        @foreach($reviewRecommendedBooks as $book)
            <div class="col-2 p-0" id="column1">
                <a href="/book/show/{{ $book->id }}" class="card">
                <div class="card w-100 shadow p-2" style="border-style: none;">
                    <img class="card-img-top" src="{{ asset('image/'.$book->image) }}" alt="Card image cap">
                    <div class="card-body p-0 title1">
                        <span class="badge badge-pill badge-primary my-2">{{ $book->smallgenre }}</span>
                        <h6 class="m-0"><div class="box-read">{{ $book->title }}</div></h6>
                    </div>
                    @if($book->starAvg)
                        <div class="star-ratings-sprite" style="display: inline-block">
                            <span style="width:{{ $book->starAvg }}%" class="star-ratings-sprite-rating"></span>
                        </div>
                        <div style="margin-left:80%">({{ $book->reviewCount }})件</div>
                    @endif
                </div>
                </a>
            </div>
        @endforeach

    </div>
</div>
@endsection


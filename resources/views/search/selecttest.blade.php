@extends('layouts.app')
@section('content')

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
{{--                        @if($book->starAvg)--}}
{{--                            <div class="star-ratings-sprite" style="display: inline-block">--}}
{{--                                <span style="width:{{ $book->starAvg }}%" class="star-ratings-sprite-rating"></span>--}}
{{--                            </div>--}}
{{--                            <div style="margin-left:80%">({{ $book->reviewCount }})件</div>--}}
{{--                        @endif--}}
                    </div>
                </a>
            </div>
        @if( $key%5 === 4)
                </div>
        @endif
        @endforeach




@endsection

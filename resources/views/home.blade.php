@extends('layouts.app')

@section('content')
    <div class="top-rireki">
        <div class="midashi-h">
            <p>履歴からおすすめ</p>
            <div></div>
        </div>
        <div class="osusume-block d-flex justify-content-between">
            @isset($rentalRecommendedBooks)
            @foreach($rentalRecommendedBooks as $book)
            <div class="osusume">
                <div class="osusume-img">
                    <img src="{{ asset('image/'.$book->image) }}">
                </div>
                <div class="osusume-kate">{{ $book->title }}</div>
                <div class="osusume-title1"></div>
                <div class="osusume-title2">
                    <div class="hirano">
                        <p>{{ $book->detail }}</p>
                    </div>
                </div>
            </div>
            @endforeach
                @endisset
        </div>
    </div>

    <div class="top-kisetsu">
        <div class="midashi-h">
            <p>季節のおすすめ</p>
            <div></div>
        </div>
        <div class="osusume-block d-flex justify-content-between">
            @foreach($indexBooks1 as $book)
            <div class="osusume">
                <div class="osusume-img">
                    <img src="{{ asset('image/'.$book->image) }}">
                </div>
                <div class="osusume-kate">{{ $book->largegenre }}</div>
                <div class="osusume-title1"></div>
                <div class="osusume-title2">
                    <div class="hirano">
                        <p>{{ $book->title }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="osusume-block d-flex justify-content-between">
            @foreach($indexBooks2 as $book)
                <div class="osusume">
                    <div class="osusume-img">
                        <img src="{{ asset('image/'.$book->image) }}">
                    </div>
                    <div class="osusume-kate">{{ $book->largegenre }}</div>
                    <div class="osusume-title1"></div>
                    <div class="osusume-title2">
                        <div class="hirano">
                            <p>{{ $book->title }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection


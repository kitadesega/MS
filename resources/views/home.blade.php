@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="top-rireki">
        <h1>履歴からのおすすめ</h1>
        @if($rentalRecommendedBooks)
            <div class="osusume-block d-flex justify-content-between">
            @foreach($rentalRecommendedBooks as $book)

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
            @endforeach
            </div>
        @else
            <h2>ログインしてください</h2>

        @endif
    </div>
    <div class="top-kisetsu">
        <h1>季節のおすすめ</h1>
        <div class="osusume-block d-flex justify-content-between">
            <div class="osusume">
                <div class="osusume-img">
                    <img src="images/tst.png">
                </div>
                <div class="osusume-kate">ジャンル</div>
                <div class="osusume-title1"></div>
                <div class="osusume-title2">
                    <div class="hirano">
                        <p>ああああああああああああああああああああああああああああああああああああああ</p>
                    </div>
                </div>
            </div>
            <div class="osusume">
                <div class="osusume-img">
                    <img src="images/tst.png">
                </div>
                <div class="osusume-kate">ジャンル</div>
                <div class="osusume-title1"></div>
                <div class="osusume-title2"></div>
            </div>
            <div class="osusume">
                <div class="osusume-img">
                    <img src="images/tst.png">
                </div>
                <div class="osusume-kate">ジャンル</div>
                <div class="osusume-title1"></div>
                <div class="osusume-title2"></div>
            </div>
            <div class="osusume">
                <div class="osusume-img">
                    <img src="images/tst.png">
                </div>
                <div class="osusume-kate">ジャンル</div>
                <div class="osusume-title1"></div>
                <div class="osusume-title2"></div>
            </div>
        </div>
        <div class="osusume-block d-flex justify-content-between">
            <div class="osusume">
                <div class="osusume-img">
                    <img src="images/tst.png">
                </div>
                <div class="osusume-kate">ジャンル</div>
                <div class="osusume-title1"></div>
                <div class="osusume-title2">
                    <div class="hirano">
                        <p>ああああああああああああああああああああああああああああああああああああああ</p>
                    </div>
                </div>
            </div>
            <div class="osusume">
                <div class="osusume-img">
                    <img src="images/tst.png">
                </div>
                <div class="osusume-kate">ジャンル</div>
                <div class="osusume-title1"></div>
                <div class="osusume-title2"></div>
            </div>
            <div class="osusume">
                <div class="osusume-img">
                    <img src="images/tst.png">
                </div>
                <div class="osusume-kate">ジャンル</div>
                <div class="osusume-title1"></div>
                <div class="osusume-title2"></div>
            </div>
            <div class="osusume">
                <div class="osusume-img">
                    <img src="images/tst.png">
                </div>
                <div class="osusume-kate">ジャンル</div>
                <div class="osusume-title1"></div>
                <div class="osusume-title2"></div>
            </div>
        </div>
    </div>
</div>


@endsection


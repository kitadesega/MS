@extends('layouts.app')

@section('content')
    <div class="top-rireki">
        <div class="midashi-h">
            <p>履歴からおすすめ</p>
            <div></div>
        </div>
        <div class="osusume-block d-flex justify-content-between">
{{--            @foreach($rentalRecommendedBooks as $book)--}}
{{--            <div class="osusume">--}}
{{--                <div class="osusume-img">--}}
{{--                    <img src="{{ asset('image/'.$book->image) }}">--}}
{{--                </div>--}}
{{--                <div class="osusume-kate">{{ $book->title }}</div>--}}
{{--                <div class="osusume-title1"></div>--}}
{{--                <div class="osusume-title2">--}}
{{--                    <div class="hirano">--}}
{{--                        <p>{{ $book->detail }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}
        </div>
    </div>

    <div class="top-kisetsu">
        <div class="midashi-h">
            <p>季節のおすすめ</p>
            <div></div>
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

@endsection


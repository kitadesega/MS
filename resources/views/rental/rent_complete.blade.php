@extends('layouts.app')

@section('content')
    <div class="container-fluid result">


        <div class="midashi-h">
            <p>貸出完了しました</p>
            <div></div>
        </div>

        <div class="card-syousai">
            <div class="row m-3">

                <div class="col-7" id="column2">
                    <p class="kansou-txt">本の貸出が登録されました。</p>
                    <p class="kansou-txt">返却日は一週間後の{{ $rentalReturnDate }}です。</p>
                </div>
            </div>
        </div>

    </div>
@endsection

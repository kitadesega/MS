@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">返却日</div>

                    <div class="card-body">

                        <div class="row">
                            <form action="/rental/rent" method="post">
                                @csrf
                            <input type="date" name="returnDate" min="{{ date("Y-m-d") }}"></input>
                                <input type="hidden" name="bookId" value="{{$bookId}}">
                                <button type="submit" class="btn btn-primary">レンタル</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                        <div class="row">
                            @foreach($books as $book)
                            <div class="col-sm-6 col-md-4">
                                <a href="#" class="card">
                                    <img class="card-img" src="{{ asset('image/'.$book->image) }}" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{$book->title}}</h5>
                                    <p class="card-text"style="height: 200px;overflow: hidden; ">{{$book->detail}}</p>
                                    @if($book->rental_flag)
{{--                                        貸出美:{{$book->startDay}}--}}
                                        <a href="#" class="btn btn-danger">返却日:{{$book->returnDay}}</a>
                                    @else
                                        <form action="/rental/rentConfirm" method="post">
                                            @csrf
                                            <input type="hidden" name="bookId" value="{{$book->id}}">
                                            <button type="submit" class="btn btn-primary">レンタル</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

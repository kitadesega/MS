@extends('layouts.app')

@section('content')


<div class="card-syousai" style="width:800px;">

        <div class="col-12">
        <form action="/presentation/score"method="post">
            @csrf
            <p class="kansou-txt">感想を書く</p>
            <div class="kansou-area">
                <textarea name="Impressions" id="textarea1" class="form-control" style="height:300px;"></textarea>
            </div>
            <p class="henkyaku-bu">
                <button type="submit" class="btn btn-primary btn-lg btn-block">送信</button>
            </p>
            <input type="hidden" name="bookId" value="a">
        </form>
        </div>
</div>

</article>


@endsection

<script>
    function starBrighten(starNumber){

        for (  var i = 1;  i <= starNumber;  i++  ) {
            $('#star_'+i).html('<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMzgiIGhlaWdodD0iMzUiPjxkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD0iYSIgeDE9IjUwJSIgeDI9IjUwJSIgeTE9IjI3LjY1JSIgeTI9IjEwMCUiPjxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNGRkNFMDAiLz48c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNGRkE3MDAiLz48L2xpbmVhckdyYWRpZW50PjxwYXRoIGlkPSJiIiBkPSJNMTkgMGwtNS44NyAxMS41MkwwIDEzLjM3bDkuNSA4Ljk3TDcuMjYgMzUgMTkgMjkuMDIgMzAuNzUgMzVsLTIuMjQtMTIuNjYgOS41LTguOTctMTMuMTMtMS44NXoiLz48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48dXNlIGZpbGw9InVybCgjYSkiIHhsaW5rOmhyZWY9IiNiIi8+PHBhdGggc3Ryb2tlPSIjQTI2QTAwIiBzdHJva2Utb3BhY2l0eT0iLjc1IiBkPSJNMTkgMS4xbC01LjU0IDEwLjg4TDEuMSAxMy43Mmw4Ljk0IDguNDRMNy45MiAzNC4xIDE5IDI4LjQ2bDExLjA4IDUuNjQtMi4xMS0xMS45NCA4Ljk0LTguNDQtMTIuMzYtMS43NEwxOSAxLjF6Ii8+PC9nPjwvc3ZnPg==" >')
        }
        for (  var i = starNumber+1;  i <= 5;  i++  ) {
            $('#star_'+i).html('<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMzgiIGhlaWdodD0iMzUiPjxkZWZzPjxwYXRoIGlkPSJhIiBkPSJNMTkgMGwtNS44NyAxMS41MkwwIDEzLjM3bDkuNSA4Ljk3TDcuMjYgMzUgMTkgMjkuMDIgMzAuNzUgMzVsLTIuMjQtMTIuNjYgOS41LTguOTctMTMuMTMtMS44NXoiLz48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48dXNlIGZpbGw9IiNGRkYiIHhsaW5rOmhyZWY9IiNhIi8+PHBhdGggc3Ryb2tlPSIjQTI2QTAwIiBzdHJva2Utb3BhY2l0eT0iLjc1IiBkPSJNMTkgMS4xbC01LjU0IDEwLjg4TDEuMSAxMy43Mmw4Ljk0IDguNDRMNy45MiAzNC4xIDE5IDI4LjQ2bDExLjA4IDUuNjQtMi4xMS0xMS45NCA4Ljk0LTguNDQtMTIuMzYtMS43NEwxOSAxLjF6Ii8+PC9nPjwvc3ZnPg==">')
        }
        $('#starSelect').val(starNumber);

    }
</script>



@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">本の返却</div>

                    <div class="card-body">

                            <div class="form-group">
                                <label for="text1">本の番号を入力、またはバーコードをスキャンしてください</label>
                                <input type="text" id="bookBarcode" class="form-control">
                            </div>


                        <div id ="book">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- テキストボックス非表示にするためのstyle -->
{{--<style>--}}
{{--    #bookBarcode:focus{--}}
{{--        box-shadow: none;--}}
{{--    }--}}
{{--    .form-control-input{--}}
{{--        width: 100%;--}}
{{--        position: relative;--}}
{{--        z-index: 1;--}}
{{--    }--}}
{{--    .form-control-input::before{--}}
{{--        content: "";--}}
{{--        position: absolute;--}}
{{--        top: 0;--}}
{{--        left: 0;--}}
{{--        z-index: 2;--}}
{{--        background: #fff;--}}
{{--        width: 100%;--}}
{{--        height: 100%;--}}
{{--    }--}}
{{--</style>--}}

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script>

    function starBrighten(starNumber){

        var starCount = 1;

        for (  var i = 1;  i <= starNumber;  i++  ) {
            starCount +=1;

            $('#star_'+i).html('<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMzgiIGhlaWdodD0iMzUiPjxkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD0iYSIgeDE9IjUwJSIgeDI9IjUwJSIgeTE9IjI3LjY1JSIgeTI9IjEwMCUiPjxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNGRkNFMDAiLz48c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNGRkE3MDAiLz48L2xpbmVhckdyYWRpZW50PjxwYXRoIGlkPSJiIiBkPSJNMTkgMGwtNS44NyAxMS41MkwwIDEzLjM3bDkuNSA4Ljk3TDcuMjYgMzUgMTkgMjkuMDIgMzAuNzUgMzVsLTIuMjQtMTIuNjYgOS41LTguOTctMTMuMTMtMS44NXoiLz48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48dXNlIGZpbGw9InVybCgjYSkiIHhsaW5rOmhyZWY9IiNiIi8+PHBhdGggc3Ryb2tlPSIjQTI2QTAwIiBzdHJva2Utb3BhY2l0eT0iLjc1IiBkPSJNMTkgMS4xbC01LjU0IDEwLjg4TDEuMSAxMy43Mmw4Ljk0IDguNDRMNy45MiAzNC4xIDE5IDI4LjQ2bDExLjA4IDUuNjQtMi4xMS0xMS45NCA4Ljk0LTguNDQtMTIuMzYtMS43NEwxOSAxLjF6Ii8+PC9nPjwvc3ZnPg==" >')
        }
        for (  var i = starCount;  i <= 5;  i++  ) {
            $('#star_'+i).html('<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMzgiIGhlaWdodD0iMzUiPjxkZWZzPjxwYXRoIGlkPSJhIiBkPSJNMTkgMGwtNS44NyAxMS41MkwwIDEzLjM3bDkuNSA4Ljk3TDcuMjYgMzUgMTkgMjkuMDIgMzAuNzUgMzVsLTIuMjQtMTIuNjYgOS41LTguOTctMTMuMTMtMS44NXoiLz48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48dXNlIGZpbGw9IiNGRkYiIHhsaW5rOmhyZWY9IiNhIi8+PHBhdGggc3Ryb2tlPSIjQTI2QTAwIiBzdHJva2Utb3BhY2l0eT0iLjc1IiBkPSJNMTkgMS4xbC01LjU0IDEwLjg4TDEuMSAxMy43Mmw4Ljk0IDguNDRMNy45MiAzNC4xIDE5IDI4LjQ2bDExLjA4IDUuNjQtMi4xMS0xMS45NCA4Ljk0LTguNDQtMTIuMzYtMS43NEwxOSAxLjF6Ii8+PC9nPjwvc3ZnPg==">')

        }
    }

    $(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        /* Ajax通信開始 */

        $('#bookBarcode').on('change', function () {
// console.log(toHalfWidth($('#bookBarcode').val()));
            var request = $.ajax({
                type: 'POST',
                data: {
                    bookBarcode: $('#bookBarcode').val()
                },
                url: '/ajaxBookSearch',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                cache: false,
                dataType: 'json',
                timeout: 3000
            });

            /* 成功時 */
            request.done(function (data) {
                console.log(data);
                $('#book').empty();
                $('#bookBarcode').val('');
                if (Object.keys(data).length) {
                    $('#book').append(
                        '<div class="col-sm-6 col-md-4">' +
                        '<a href="#" class="card">' +
                        '<img class="card-img" src="{{ asset('') }}image/' + data.image + '" alt="...">' +
                        '</a>' +
                        '<div class="card-body">' +
                        '<h5 class="card-title">' + data.title + '</h5>' +
                        '<p class="card-text"style="height: 200px;overflow: hidden; ">' + data.detail + '</p>' +
                        '<form action="/rental/returnBook" method="post">@csrf' +
                        '<input type="hidden" name="returnBookId" value="' + data.id + '">' +
                        '<button type="submit" class="btn btn-primary">返却</button>'+
                        '</form>' +
                        '</div>' +
                        '</div>'
                    );
                }else{
                    $('#book').append('<h1>存在しません</h1>');
                }

            });

            /* 失敗時 */
            request.fail(function () {
                alert("通信に失敗しました");
            });

        });
    });

    function toHalfWidth(strVal){
        // 半角変換
        var halfVal = strVal.replace(/[！-～]/g,
            function( tmpStr ) {
                // 文字コードをシフト
                return String.fromCharCode( tmpStr.charCodeAt(0) - 0xFEE0 );
            }
        );

        // 文字コードシフトで対応できない文字の変換
        return halfVal.replace(/”/g, "\"")
            .replace(/’/g, "'")
            .replace(/‘/g, "`")
            .replace(/￥/g, "\\")
            .replace(/　/g, " ")
            .replace(/〜/g, "~");
    }
</script>

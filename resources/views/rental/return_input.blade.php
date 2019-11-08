@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">本の返却</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="text1">本の番号を入力、またはバーコードをスキャンしてください</label>
                                <input type="text" id="bookBarcode" class="form-control">
                            </div>
                        </div>

                        <div id ="book">

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script>
    $(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        /* Ajax通信開始 */

        $('#bookBarcode').on('change', function () {
console.log(toHalfWidth($('#bookBarcode').val()));
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
                        '<input type="hidden" name="bookId" value="' + data.id + '">' +
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

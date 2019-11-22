@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">バーコードログイン</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="text1">バーコードをスキャンしてください</label>
                                <div class="form-control-input">
                                  <input type="text" id="userBarcode" class="form-control" onblur="myFnc();" Ω>
                                </div>
                            </div>

                            <div id="login-check">

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- テキストボックス非表示にするためのstyle -->
<style>
    #userBarcode:focus{
        box-shadow: none;
    }
    .form-control-input{
        width: 100%;
        position: relative;
        z-index: 1;
    }
    .form-control-input::before{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
        background: #fff;
        width: 100%;
        height: 100%;
    }
</style>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script>
    $(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        /* Ajax通信開始 */

        $('#userBarcode').on('change', function () {
// console.log(toHalfWidth($('#bookBarcode').val()));
            var request = $.ajax({
                type: 'POST',
                data: {
                    userBarcode: $('#userBarcode').val()
                },
                url: '/ajaxBarcodeLogin',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                cache: false,
                dataType: 'json',
                timeout: 3000
            });

            /* 成功時 */
            $('#userBarcode').val('');
            $('#login-check').empty();
            request.done(function (data) {
                if(data === true){
                    $('#login-check').append('<h2>ログインに成功しました。5秒後にトップへ戻ります。</h2>');
                    setTimeout("location.reload()",5000);
                }else{
                    $('#login-check').append('<h2>ログインに失敗しました。</h2>');
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
    function myFnc(){
        $('input:visible').eq(0).focus();
    }
</script>
<script>
    $(document).ready( function(){
        $('input:visible').eq(0).focus();
    });
</script>
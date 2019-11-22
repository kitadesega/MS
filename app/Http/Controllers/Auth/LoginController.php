<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function barcodeLogin(){
        return view('auth.barcode_login');
    }

    public function ajaxBarcodeLogin(Request $request){

        $result = false;

        $user = User::where('uuid',$request->userBarcode)->first();
        if(!is_null($user)){
            Auth::login($user);
            $result = true;
        }

        return response()->json($result);
    }

//$user = \App\User::where('uuid', $request->uuid)->first();
//
//if(!is_null($user)) {
//
//\Auth::login($user);    // ユーザーをログインさせる
//$result = true;
//
//}

}

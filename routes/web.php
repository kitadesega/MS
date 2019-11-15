<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/barcodeLogin', 'Auth\LoginController@barcodeLogin');
//バーコードログイン
Route::post('/ajaxBarcodeLogin', 'Auth\LoginController@ajaxBarcodeLogin');

Route::prefix('rental')->group(function () {
    Route::get('rentBookInput', 'RentalController@rentBookInput')->name('rental');
    Route::post('rentConfirm', 'RentalController@rentConfirm')->name('rental');
    Route::post('rent', 'RentalController@rent')->name('rental');

    Route::get('returnBookInput', 'RentalController@returnBookInput')->name('rental');
    Route::post('returnBook', 'RentalController@returnBook')->name('rental');
});
//バーコード本検索
Route::post('/ajaxBookSearch', 'RentalController@ajaxBookSearch');

//レビュー機能
Route::post('/review', 'RentalController@review');
Route::get('/reviewComplete', function () {
    return view('review.review_complete');
});

//
///*
//|--------------------------------------------------------------------------
//| 2) User ログイン後
//|--------------------------------------------------------------------------
//*/
//Route::group(['middleware' => 'auth:user'], function() {
//    Route::get('/home', 'HomeController@index')->name('home');
//});

/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});

/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
//    Route::get('login',     'Admin\HomeController@index')->name('admin.home');
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');
});
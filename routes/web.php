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

Route::prefix('search')->group(function(){
	Route::get('test', 'SearchController@test')->name('test');
	Route::post('allSelect', 'SearchController@allSelect')->name('select');
	Route::post('titleSelect', 'SearchController@titleSelect')->name('select');
	Route::post('fuzzySelect', 'SearchController@fuzzySelect')->name('select');
	Route::post('genreSelect', 'SearchController@genreSelect')->name('select');
});

//バーコード本検索
Route::post('/ajaxBookSearch', 'RentalController@ajaxBookSearch');



<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'api','as','api.mpesa','namespace'=>'Api\V1\Payment\Mpesa'], function(){
    Route::group(['as'=>'c2b'],function(){
        Route::get('m-trx/confirm/{confirmation_key}','C2BController@confirmTrx')->name('validate');
        Route::get('m-trx/validate/{validation_key}','C2BController@validateTrx')->name('confirm');
    });
});
Route::post('v1/access/token', 'MpesaController@generateAccessToken');
Route::post('v1/webtech/stk/push', 'MpesaController@customerMpesaSTKPush');
Route::post('v1/webtech/validation', 'MpesaController@mpesaValidation');
Route::post('v1/webtech/transaction/confirmation', 'MpesaController@mpesaConfirmation');
Route::post('v1/webtech/register/url', 'MpesaController@mpesaRegisterUrls');













// <?php

// use Illuminate\Http\Request;

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
// */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('v1/access/token', 'MpesaController@generateAccessToken');
// Route::post('v1/hlab/stk/push', 'MpesaController@customerMpesaSTKPush');
// Route::post('v1/hlab/validation', 'MpesaController@mpesaValidation');
// Route::post('v1/hlab/transaction/confirmation', 'MpesaController@mpesaConfirmation');
// Route::post('v1/hlab/register/url', 'MpesaController@mpesaRegisterUrls');

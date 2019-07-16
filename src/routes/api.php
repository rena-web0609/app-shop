<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group(['prefix' => 'v1'], function() {
    //検索機能
    Route::get('/products', 'ProductController@getSearchByProduct');
    //性別検索
    Route::get('/products/{sex}', 'CategoryController@list')->name('products.category');
});


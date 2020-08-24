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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('webhook', 'WebhookController@index');
Route::post('webhook', 'WebhookController@index');
Route::post('sendPusher', 'WebhookController@sendPusher');

Route::group(['prefix' => '/articles'], function () {
    Route::get('/', 'ArticleController@getArticle');
    Route::get('/create', 'ArticleController@create');
    Route::post('/store', 'ArticleController@store');
    Route::get('/{id}/delete', 'ArticleController@destroy');
});

Route::group(['prefix' => '/categories'], function () {
    Route::get('/', 'CategoryController@index');
    Route::post('/store', 'CategoryController@store');
    Route::get('/getCategories', 'CategoryController@getCategories');
    Route::get('/{id}/delete', 'CategoryController@destroy');
});



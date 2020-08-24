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

Route::get('/', function () {
    return view('welcome');
});

Route::get('pusher','WebhookController@pusher');
Route::get('sendPusher','WebhookController@sendPusher');

Route::group(['prefix' => '/webview'], function () {
    Route::get('/{category}', 'WebviewController@list');
    Route::get('/{category}/{article}', 'WebviewController@detail');
});


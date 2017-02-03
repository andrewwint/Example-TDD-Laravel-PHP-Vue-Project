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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/clustervalues', [
        'uses' => 'ClusterValuesController@index',
        'as' => 'clustervalues'
    ]);
    Route::get('/clustervalues/d/{d}', [
        'uses' => 'ClusterValuesController@getBySegment',
        'as' => 'clustervaluessegment'
    ]);

    Route::post('/clustervalues/update', [
        'uses' => 'ClusterValuesController@update',
        'as' => 'clustervaluesupdate'
    ]);


    Route::get('/messages', [
        'uses' => 'HomeController@messages',
        'as' => 'messages'
    ]);

    Route::get('/products', [
        'uses' => 'HomeController@products',
        'as' => 'products'
    ]);

    Route::get('/useraccount', [
        'uses' => 'HomeController@useraccount',
        'as' => 'useraccount'
    ]);


});

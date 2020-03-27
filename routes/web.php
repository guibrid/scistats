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

//Route::get('/import','OrderController@import');

Route::get('/importExportView', 'OrderController@importExportView');

Route::post('import', 'OrderController@import')->name('import');
Route::get('/orders', 'OrderController@index');
Route::get('/top', 'ItemController@top');

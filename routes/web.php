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

Route::get('/uploadfile', 'UploadfileController@index');
Route::post('/uploadfile', 'UploadfileController@upload');
Route::get('/uploadfile/{file}','UploadfileController@show');

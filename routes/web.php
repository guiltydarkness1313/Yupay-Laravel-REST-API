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
Route::get('/data','ApiController@listCloth');

Route::get('/v1/list','ApiController@getAllCloth');

Route::get('/v1/listRegistry','ApiController@getAllRegistry');

Route::post('/v1/item','ApiController@insertItem');

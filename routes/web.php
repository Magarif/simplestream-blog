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


Route::get('/', 'PostController@index');
Route::get('/create', 'PostController@create');
Route::post('/create', 'PostController@store');
Route::get('/post/{slug?}', 'PostController@show');
Route::get('/post/{slug?}/edit', 'PostController@edit');

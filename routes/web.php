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
Route::get('/home', 'PostController@index');
Route::get('/create', 'PostController@create')->middleware('auth');
Route::post('/create', 'PostController@store')->middleware('auth');
Route::get('/post/{slug?}', 'PostController@show');
Route::get('/post/{slug?}/edit', 'PostController@edit')->middleware('auth');
Route::patch('/post/{slug?}/edit', 'PostController@update')->middleware('auth');
Route::delete('/post/{slug?}/delete', 'PostController@destroy')->middleware('auth');
// Auth routes
Route::get('/auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/auth/register', 'Auth\RegisterController@register');
Route::get('/auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/auth/login', 'Auth\LoginController@login');
Route::get('/auth/logout', 'Auth\LoginController@logout');
// Comment route
Route::post('/comment', 'CommentsController@newComment');

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
use Illuminate\Http\Request;
	
//
//    Setup up routing for the controllers. Also directs to middleware for Cacheing
//
Route::get('/', 'NewsController@index')->middleware('before')->middleware('after')->name('newshome');
Route::get('/addnews', ['as' => 'add_news', 'uses' => 'NewsController@create'])->middleware('before')->middleware('after');
Route::get('/addnews/{id}', ['as' => 'show_news_item', 'uses' => 'NewsController@show'])->middleware('before')->middleware('after');
Route::get('/addnews/{id}/edit', ['as' => 'edit_news_item', 'uses' => 'NewsController@edit'])->middleware('before')->middleware('after');
Route::put('/addnews/{id}', ['as' => 'put_news_item', 'uses' => 'NewsController@update'])->middleware('before')->middleware('after');
Route::delete('/addnews/{id}', ['as' => 'delete_news_item', 'uses' => 'NewsController@destroy']);
Route::post('/addnews', 'NewsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

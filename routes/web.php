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

Route::get('/', 'NewsController@index');
Route::get('/addnews', 'NewsController@create');
Route::get('/addnews/{id}', ['as' => 'show_news_item', 'uses' => 'NewsController@show']);
Route::get('/addnews/{id}/edit', ['as' => 'edit_news_item', 'uses' => 'NewsController@edit']);
Route::put('/addnews/{id}', ['as' => 'put_news_item', 'uses' => 'NewsController@update']);
Route::delete('/addnews/{id}', ['as' => 'delete_news_item', 'uses' => 'NewsController@destroy']);
Route::post('/addnews', 'NewsController@store');
Route::get('/memcache', function(){
    //Cache::put( 'cachekey', 'I am in the cache baby!', 1 );
    // if( Cache::has( 'cachekey' ) ) {
	// 	return Cache::get( 'cachekey' );
	// }
    //Cache::forget( 'cachekey' );
    return Cache::get( 'cachekey', 'The cache is empty, so here is something to keep you happy'  );
});


    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

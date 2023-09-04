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

Route::group(['middleware' => 'auth', 'prefix' => 'produtos', 'as' => 'products.'], function() {
    Route::get('', 'ProductController@index')->name('index');
    Route::get('/criar', 'ProductController@create')->name('create');
    Route::post('/criar', 'ProductController@store')->name('store');
    Route::get('/{id}/produto', 'ProductController@show')->name('show')->where('id', '[0-9]+');;
    Route::get('/{id}/editar', 'ProductController@edit')->name('edit')->where('id', '[0-9]+');;
    Route::post('/{id}/editar', 'ProductController@update')->name('update')->where('id', '[0-9]+');;
    Route::delete('/{id}/excluir', 'ProductController@destroy')->name('destroy')->where('id', '[0-9]+');;
    Route::any('/search', 'ProductController@search')->name('search');
});

Route::group(['middleware' => 'auth', 'prefix' => 'estoque', 'as' => 'stock.'], function() {
    Route::get('/{id}', 'ProductStockController@index')->name('index')->where('id', '[0-9]+');;
    Route::get('/entrada/{id}', 'ProductStockController@create')->name('create')->where('id', '[0-9]+');;
    Route::get('/saida/{id}', 'ProductStockController@stockOutput')->name('output')->where('id', '[0-9]+');;
    Route::post('/criar', 'ProductStockController@store')->name('store');
    Route::get('/{id}/produto', 'ProductStockController@show')->name('show')->where('id', '[0-9]+');;
    Route::get('/{id}/editar', 'ProductStockController@edit')->name('edit')->where('id', '[0-9]+');;
    Route::post('/{id}/editar', 'ProductStockController@update')->name('update')->where('id', '[0-9]+');;
    Route::delete('/{id}/excluir', 'ProductStockController@destroy')->name('destroy')->where('id', '[0-9]+');;
    Route::any('/search', 'ProductStockController@search')->name('search');
});

Route::resource('/customers', 'CustomerController')->middleware('auth');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

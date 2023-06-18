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
    Route::get('/{id}/produto', 'ProductController@show')->name('show');
    Route::get('/{id}/editar', 'ProductController@edit')->name('edit');
    Route::post('/{id}/editar', 'ProductController@update')->name('update');
    Route::delete('/{id}/excluir', 'ProductController@destroy')->name('destroy');
    Route::any('/search', 'ProductController@search')->name('search');
});

Route::group(['middleware' => 'auth', 'prefix' => 'estoque', 'as' => 'stock.'], function() {
    Route::get('/entrada/{id}', 'ProductStockController@stockEntry')->name('entry');
    Route::get('/saida/{id}', 'ProductStockController@stockOutput')->name('output');
    Route::post('/criar', 'ProductStockController@store')->name('store');
    Route::get('/{id}/produto', 'ProductStockController@show')->name('show');
    Route::get('/{id}/editar', 'ProductStockController@edit')->name('edit');
    Route::post('/{id}/editar', 'ProductStockController@update')->name('update');
    Route::delete('/{id}/excluir', 'ProductStockController@destroy')->name('destroy');
    Route::any('/search', 'ProductStockController@search')->name('search');
});

Route::resource('/customers', 'CustomerController')->middleware('auth');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

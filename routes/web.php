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

Route::group(['prefix' => 'produtos', 'as' => 'products.'], function() {
    Route::get('', 'ProductController2@index')->name('index');
    Route::get('/criar', 'ProductController2@create')->name('create');
    Route::post('/criar', 'ProductController2@store')->name('store');
    Route::get('/{id}/produto', 'ProductController2@show')->name('show');
    Route::get('/{id}/editar', 'ProductController2@edit')->name('edit');
    Route::put('/{id}/editar', 'ProductController2@update')->name('update');
    Route::delete('/{id}/excluir', 'ProductController2@destroy')->name('destroy');
});

//Route::get('/categorias/{flag}', function ($flag) {
//   return "Produtos da categoria: {$flag}";
//});

//Route::match(['post', 'get'], '/match', function () {
//   return 'match';
//});

Route::get('/', function () {
    return view('welcome');
});

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
Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::apiResources([
            'produtos'          => 'ProdutoController',
            'lojas'             => 'LojaController'
        ]);

        Route::get('/estoques', 'EstoqueController@index')->name('estoques.index');
        Route::post('/estoques', 'EstoqueController@store')->name('estoques.store');
        Route::put('/estoques/{id}', 'EstoqueController@update')->name('estoques.update');
        Route::get('/estoques/{id}', 'EstoqueController@show')->name('estoques.show');
        Route::get('/estoques/produtos/{id}', 'EstoqueController@findByProduto')->name('estoques.findByProduto');
        Route::get('/estoques/loja/{id}', 'EstoqueController@findByLoja')->name('estoques.findByLoja');
        Route::delete('/estoques/{id}', 'EstoqueController@destroy')->name('estoques.destroy');
    });
});
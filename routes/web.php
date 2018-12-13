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
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('enderecos', 'EnderecoController');

Route::resource('pontos', 'PontoController');

Route::resource('vistorias', 'VistoriaController');

Route::get('autocomplete/endereco','EnderecoController@autoComplete')->name('autocomplete.endereco');

Route::get('autocomplete/ponto','PontoController@autoComplete')->name('autocomplete.ponto');

Route::get('vistoria_detail/{ponto_id}','VistoriaController@createDetail')->name('vistorias.create.detail');

Route::get('ponto/{ponto_id}','PontoController@index2')->name('ponto');


Route::get('fotos', 'FotoController@index')->name('fotos');

Route::post('fotos/store', 'FotoController@store')->name('fotos.store');

Route::delete('fotos/{id}', 'FotoController@destroy')->name('fotos.destroy');

Route::get('fotos/download/{id}', 'FotoController@download')->name('fotos.download');

Route::resource('categories', 'CategoryController');
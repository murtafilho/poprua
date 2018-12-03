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

Route::get('/', 'FotosController@index');
Route::post('/', 'FotosController@store');
Route::delete('/{id}', 'FotosController@destroy');
Route::get('/download/{id}', 'FotosController@download');



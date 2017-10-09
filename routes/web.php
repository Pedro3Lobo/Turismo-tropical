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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/levadas', function () {
   // return view('levadas');
//});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/levadas_table',[
  'uses' => 'HomeController@getLevadas_table', 'as' =>'levadas_table'
]);

Route::get('/reserva_table',[
  'uses' => 'HomeController@getReservas_table', 'as' =>'reserva_table'
]);

Route::get('/excursões_info/{id}',[
  'uses' => 'FrontController@getExcursões_info', 'as' =>'excursões_info'
]);

Route::get('/levada_info/{id}',[
  'uses' => 'FrontController@getLevada_info', 'as' =>'levada_info'
]);

Route::get('/transfer_table',[
  'uses' => 'HomeController@getTransfer_table', 'as' =>'transfer_table'
]);

Route::get('/reserva',[
  'uses' => 'FrontController@getReserva', 'as' =>'reserva'
]);


Route::get('/excursões_table',[
  'uses' => 'HomeController@getExcursões_table', 'as' =>'excursões_table'
]);

Route::get('/sobre_table',[
  'uses' => 'HomeController@getSobre_table', 'as' =>'sobre_table'
]);

Route::get('/transfer',[
  'uses' => 'FrontController@getTransfer', 'as' =>'transfer'
]);
Route::post('/transfer_inser', [
  'uses' => 'FrontController@postTransfer_inser', 'as'=>'transfer_inser'
]);

Route::post('/reserva_inser', [
  'uses' => 'FrontController@postReserva_inser', 'as'=>'reserva_inser'
]);

Route::post('/levada_inser', [
  'uses' => 'HomeController@postLevada_inser', 'as'=>'levada_inser'
]);

Route::post('/info', [
  'uses' => 'HomeController@postInfo', 'as'=>'info'
]);

Route::post('/excursao_edi', [
  'uses' => 'HomeController@postExcursao_edi', 'as'=>'excursao_edi'
]);

Route::post('/email', [
  'uses' => 'FrontController@postEmail', 'as'=>'email'
]);


Route::post('/reserva_del', [
  'uses' => 'HomeController@postReserva_del', 'as'=>'reserva_del'
]);

Route::post('/levada_edi', [
  'uses' => 'HomeController@postLevada_edi', 'as'=>'levada_edi'
]);
Route::post('/levada_del', [
  'uses' => 'HomeController@postLevada_del', 'as'=>'levada_del'
]);
Route::post('/excursao_del', [
  'uses' => 'HomeController@postExcursao_del', 'as'=>'excursao_del'
]);

Route::get('levadas', 'FrontController@getLevadas')->name('levadas');
Route::get('excursoes', 'FrontController@getExcursao')->name('excursoes');

Route::post('/excursao_inser', [
  'uses' => 'HomeController@postExcursao_inser', 'as'=>'excursao_inser'
]);
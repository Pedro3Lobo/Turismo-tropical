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
Route::get('/levadas', function () {
    return view('levadas');
});
Route::get('/levadas', 'HomeController@getLevadas')->name('levadas');
Route::get('/excursoes', 'HomeController@getExcursoes')->name('excursoes');

Route::get('/levadas_table',[
  'uses' => 'HomeController@getLevadas_table', 'as' =>'levadas_table'
]);
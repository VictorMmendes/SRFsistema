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

Route::get('/', 'SocioController@listar')->middleware('auth');
Route::post('/cadastrar', 'SocioController@cadastrar');
Route::post('/enviar', 'SocioController@enviarEmail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/',['as' => 'index', 'uses' => 'PagesController@index']);

Route::get('contacto',['as' => 'contacto', 'uses' => 'PagesController@contacto']);

Route::post('enviar-mensaje','PagesController@postmsg');

Route::get('donaciones',['as' => 'donaciones','uses' => 'PagesController@donaciones']);

Route::get('messages/create',['as' => 'messages.create','uses'=> 'MessagesController@create']);

Route::post('messages',['as' => 'messages.store','uses'=> 'MessagesController@store']);
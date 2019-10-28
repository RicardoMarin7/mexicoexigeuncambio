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


/** Paginas  */
Route::get('/',['as' => 'index', 'uses' => 'PagesController@index']);

Route::get('donaciones',['as' => 'donaciones','uses' => 'PagesController@donaciones']);

Route::get('libros',['as' => 'libros','uses' => 'PagesController@libros']);

Route::get('nosotros',['as' => 'nosotros','uses' => 'PagesController@nosotros']);

/** Mensajes */
Route::resource('messages','MessagesController');

/** Login-Registro-Logout */
Route::get('login',['as'=>'login','uses' => 'Auth\LoginController@ShowLoginForm']);

Route::post('login','Auth\LoginController@login');

Route::get('register',['as'=>'register','uses' => 'Auth\RegisterController@ShowRegistrationForm']);

Route::post('register','Auth\RegisterController@register');

Route::get('logout','Auth\LoginController@logout')->name('logout');

/** Contraseñas **/
Route::get('password/forgot',['as' => 'password.forgot','uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);

Route::post('password/forgot',['as' => 'password.email','uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);

Route::get('password/reset/{token}',['as' => 'password.reset','uses' => 'Auth\ResetPasswordController@showResetForm']);

Route::post('password/reset',['as' => 'password.request','uses' => 'Auth\ResetPasswordController@reset']);

// Descargas//
Route::get('download/{filename}', 'DownloadsController@download');

// Paypal // 
Route::get('/payments/pay', 'PayPalController@payOrderWithPayPal')->name('payment');
Route::get('/payments/store', 'PayPalController@saveOrder');
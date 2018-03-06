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

Route::resource('/libros', 'LibroController');
Route::resource('/users', 'UserController', ['except' => ['edit', 'update', 'show', 'destroy']]);

Route::put('/changeRole', 'UserController@changeRole')->name('users.role');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');

Route::get('user/edit', 'ProfileController@editData')->name('user.editData');
Route::put('user/update/{id}', 'ProfileController@updateData')->name('user.updateData');

Route::get('user/editPassword', 'ProfileController@editPassword')->name('user.editPassword');
Route::put('user/updatePassword', 'ProfileController@updatePassword')->name('user.updatePassword');

Route::get('prestamos', 'PrestamoController@index')->name('prestamos.index');

Route::get('prestamo', 'TransactionController@index')->name('transaction.index');
Route::get('prestamo/create', 'TransactionController@create')->name('transaction.create');

Route::post('prestamo/store', 'TransactionController@store')->name('transaction.store');


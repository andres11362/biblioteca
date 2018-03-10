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

Route::resource('/libros', 'Libro\LibroController');
Route::resource('/users', 'Usuario\UserController', ['except' => ['edit', 'update', 'show', 'destroy']]);

Route::put('/changeRole', 'Usuario\UserController@changeRole')->name('users.role');

//Auth::routes();

Route::get('/home', 'Home\HomeController@index')->name('home');

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

Route::get('user/edit', 'Usuario\ProfileController@editData')->name('user.editData');
Route::put('user/update/{id}', 'Usuario\ProfileController@updateData')->name('user.updateData');
Route::get('user/editPassword', 'Usuario\ProfileController@editPassword')->name('user.editPassword');
Route::put('user/updatePassword', 'Usuario\ProfileController@updatePassword')->name('user.updatePassword');

Route::get('prestamos', 'Prestamo\PrestamoController@index')->name('prestamos.index');

Route::get('prestamo', 'Prestamo\TransactionController@index')->name('transaction.index');
Route::get('prestamo/create', 'Prestamo\TransactionController@create')->name('transaction.create');
Route::post('prestamo/store', 'Prestamo\TransactionController@store')->name('transaction.store');

Route::put('/prestamoState', 'Prestamo\PrestamoController@prestamo')->name('prestamos.prestamo');
Route::put('/devolucionState', 'Prestamo\PrestamoController@devolucion')->name('prestamos.devolucion');
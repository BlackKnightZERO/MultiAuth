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
Route::post('/user/request', 'RequestController@add')->name('user.request');


Route::get('/user/users', 'RequestController@getuser')->name('user.user');


Route::get('/user/user-logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
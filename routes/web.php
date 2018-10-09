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

Route::get('/', 'PagesController@homepage');
Route::get('praadzan', 'PagesController@praadzan');
Route::get('praiqomah', 'PagesController@praiqomah');
Route::get('blank', 'PagesController@blank');

Route::get('admin/login', 'AdminController@login');
Route::get('admin/logout', 'AdminController@logout');
Route::post('loginPost', 'AdminController@loginPost');
Route::get('admin', 'AdminController@index');
Route::get('admins', 'AdminController@index');
Route::get('admin/agenda', 'AdminController@agenda');
Route::get('admin/detailagenda/{agenda}', 'AdminController@detailagenda');
Route::get('admin/createagenda', 'AdminController@createagenda');
Route::post('admin/agendacreate', 'AdminController@agendacreate');
Route::get('admin/hapusagenda/{id}', 'AdminController@destroy');
Route::get('admin/info', 'AdminController@info');
Route::get('admin/createinfo', 'AdminController@createinfo');
Route::get('admin/about', 'AdminController@about');
Route::get('admin/create', 'AdminController@create');
Route::post('admin', 'AdminController@store');

Route::resource('agenda','AdminController@agenda'); //tambahkan baris ini
Route::get('agenda/{agenda}', 'AdminController@show');

Route::get('halaman-rahasia',[
  'as'  => 'secret',
  'uses'=> 'RahasiaController@halamanRahasia'
]);
Route::get('showmesecret', 'RahasiaController@showMeSecret');

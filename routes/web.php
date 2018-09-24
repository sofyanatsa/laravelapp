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
Route::get('admin', 'AdminController@home');
Route::get('admin/about', 'AdminController@about');
Route::get('admin/create', 'AdminController@create');
Route::post('admin', 'AdminController@store');

Route::get('halaman-rahasia',[
  'as'  => 'secret',
  'uses'=> 'RahasiaController@halamanRahasia'
]);
Route::get('showmesecret', 'RahasiaController@showMeSecret');

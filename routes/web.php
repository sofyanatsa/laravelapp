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
Route::post('homepagePost/{id}','PagesController@homepagePost');
Route::get('praadzan', 'PagesController@praadzan');
Route::get('praiqomah/{s}/{sholat_list}', 'PagesController@praiqomah');
Route::get('blank', 'PagesController@blank');
Route::get('tes', 'PagesController@tes');

Route::get('admin/login', 'AdminController@login');
Route::get('admin/logout', 'AdminController@logout');
Route::post('loginPost', 'AdminController@loginPost');
Route::get('admin', 'AdminController@index');
Route::get('admin/about', 'AdminController@about');

// Agenda
Route::get('admin/agenda', 'AdminController@agenda');
Route::get('admin/detailagenda/{id}', 'AdminController@detailagenda');
Route::get('admin/createagenda', 'AdminController@createagenda');
Route::post('admin/agendacreate', 'AdminController@agendacreate');
Route::get('admin/hapusagenda/{id}', 'AdminController@destroyagenda');
Route::get('admin/editagenda/{id}', 'AdminController@editagenda');
Route::post('admin/agendaedit/{id}', 'AdminController@updateagenda');
Route::get('admin/onagenda/{id}', 'AdminController@onagenda');
Route::get('admin/offagenda/{id}', 'AdminController@offagenda');

// Info Baris
Route::get('admin/info', 'AdminController@info');
Route::get('admin/detailinfo/{id}', 'AdminController@detailinfo');
Route::get('admin/createinfo', 'AdminController@createinfo');
Route::post('admin/createinfoPost', 'AdminController@createinfoPost');
Route::get('admin/hapusinfo/{id}', 'AdminController@destroyinfo');
Route::get('admin/editinfo/{id}', 'AdminController@editinfo');
Route::post('admin/editinfoPost/{id}', 'AdminController@editinfoPost');
Route::get('admin/oninfo/{id}', 'AdminController@oninfo');
Route::get('admin/offinfo/{id}', 'AdminController@offinfo');

// Tema
Route::get('admin/tema', 'AdminController@tema');
Route::post('admin/temaPost/{id}', 'AdminController@temaPost');

// Durasi
Route::get('admin/durasi', 'AdminController@durasi');
Route::get('admin/durasipraadzan/{id}', 'AdminController@durasipraadzan');
Route::post('admin/durasipraadzanPost/{id}', 'AdminController@durasipraadzanPost');
Route::get('admin/durasiiqomah/{id}', 'AdminController@durasiiqomah');
Route::post('admin/durasiiqomahPost/{id}', 'AdminController@durasiiqomahPost');
Route::get('admin/durasisholat/{s}', 'AdminController@durasisholat');
Route::post('admin/durasisholatPost/{id}', 'AdminController@durasisholatPost');

// Atur waktu sholat
Route::get('admin/wsholat', 'AdminController@wsholat');
Route::get('admin/aturwsholat', 'AdminController@aturwsholat');
Route::post('admin/aturwsholatPost/{id}', 'AdminController@aturwsholatPost');

// Atur Waktu
Route::get('admin/aturwaktu', 'AdminController@aturwaktu');
Route::post('admin/aturwaktuPost', 'AdminController@aturwaktuPost');

// Detail Masjid
Route::get('admin/detailmasjid', 'AdminController@detailmasjid');
Route::get('admin/editmasjid/{id}', 'AdminController@editmasjid');
Route::post('admin/editmasjidPost/{id}', 'AdminController@editmasjidPost');

// Admin
Route::get('admin/admins', 'AdminController@admins');
Route::get('admin/detailprofil/{id}', 'AdminController@detailprofil');
Route::get('admin/aturprofil/{id}', 'AdminController@aturprofil');
Route::post('admin/profilatur/{id}', 'AdminController@updateprofil');
Route::get('admin/ubahpaswd', 'AdminController@ubahpaswd');
Route::post('admin/ubahpaswdPost/{id}', 'AdminController@ubahpaswdPost');
Route::get('admin/listadmin', 'AdminController@listadmin');
Route::get('admin/createadmin', 'AdminController@createadmin');
Route::post('admin/createadminPost', 'AdminController@createadminPost');
Route::get('admin/hapusadmin/{id}', 'AdminController@destroyadmin');

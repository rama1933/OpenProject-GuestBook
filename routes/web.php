<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'LandingController@index')->name('landing');
Route::any('landing_store', 'LandingController@store')->name('landing_store');
Route::get('/masuk', 'Otentikasi\OtentikasiController@index')->name('masuk');
Route::post('/masuk', 'Otentikasi\OtentikasiController@login')->name('masuk');

Route::group(['middleware' => 'auth'], function () {
    Route::get('tamu', 'tamu\TamuController@index')->name('tamu');
    Route::get('tamu_tambah', 'tamu\TamuController@index_tambah')->name('tamu_tambah');
    Route::get('tamu_edit/{id}', 'tamu\TamuController@index_edit')->name('tamu_edit');
    Route::any('tamu_store', 'tamu\TamuController@store')->name('tamu_store');
    Route::any('tamu_update', 'tamu\TamuController@update')->name('tamu_update');
    Route::get('tamu_hapus/{id}', 'tamu\TamuController@hapus')->name('tamu_hapus');
    Route::any('tamu_pdf', 'tamu\TamuController@pdf')->name('tamu_pdf');


    Route::get('user', 'user\UserController@index')->name('user');
    Route::get('user_tambah', 'user\UserController@index_tambah')->name('user_tambah');
    Route::get('user_edit/{id}', 'user\UserController@index_edit')->name('user_edit');
    Route::any('user_store', 'user\UserController@store')->name('user_store');
    Route::any('user_update', 'user\UserController@update')->name('user_update');
    Route::get('user_hapus/{id}', 'user\UserController@hapus')->name('user_hapus');


    Route::get('logout', 'otentikasi\OtentikasiController@logout')->name('logout');
});

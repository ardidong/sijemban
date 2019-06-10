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

Route::get('/', 'HomeController@index');
//Route::get('/coba', function(){return view('bencana.show');});

Route::resource('donasi','DonasiController');
Route::resource('bencana','BencanaController');
Route::resource('petugas','PetugasController');
Route::resource('jemput','JemputController');
Route::resource('lacak','LacakController');
Route::resource('upload','UploadController');
Route::get('/donasi/create/{id}', 'DonasiController@create');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/wew', 'AdminController@index');
Route::view('/dashboardpetugas', function () {
    return view('petugas');
})->name('petugas.dashboard');

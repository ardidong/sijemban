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


Route::resource('donasi','DonasiController');
Route::resource('bencana','BencanaController');
Route::resource('petugas','PetugasController');
Route::resource('jemput','JemputController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', function () {
    return view('admin');
});
Route::view('/dashboardpetugas', function () {
    return view('petugas');
})->name('petugas.dashboard');


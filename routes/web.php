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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route ::prefix('petugas')->group(function(){
    Route::get('/login','Auth\PetugasLoginController@showLoginForm')->name('petugas.login');
    Route::post('/login','Auth\PetugasLoginController@login')->name('petugas.login.submit');
    Route::get('/','PetugasController@index')->name('petugas.dashboard');
});

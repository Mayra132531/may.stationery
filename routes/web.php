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
    // return redirect('login')
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' =>['auth']], function(){
// Crud user
Route::resource('user','UserController');
Route::resource('pelanggan','PelangganController');
Route::resource('order','OrderController');
Route::resource('produk','ProdukController');
Route::resource('transaksi','TransaksiController');


Route::get('/laporan', 'LaporanController@index');
Route::get('/laporan/print', 'LaporanController@print');
Route::get('/laporan/export_excel', 'LaporanController@export_excel');

});
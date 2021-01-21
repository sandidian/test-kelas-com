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

Route::get('/', function () {
    return view('welcome');
    
});

Route::group([
    'prefix' => 'transaksi'
  ], function () {   

    Route::get('/', 'TransaksiController@index')->name('transaksi.index');
    Route::get('/create', 'TransaksiController@create')->name('transaksi.create');
    Route::post('/create', 'TransaksiController@createPost');
    Route::get('/edit/{id}', 'TransaksiController@edit')->name('transaksi.edit');
    Route::post('/update/{id}', 'TransaksiController@update')->name('transaksi.update');

});

Route::group([
    'prefix' => 'barang'
  ], function () {   

    Route::get('/', 'BarangController@index')->name('barang.index');
    Route::get('/transaksi/{id}', 'BarangController@transaksi')->name('barang.transaksi');
    Route::post('/transaksi/{id}', 'BarangController@transaksiPost');
    Route::get('/change/{id}', 'BarangController@change')->name('barang.change');
    Route::get('/create', 'BarangController@create')->name('barang.create');
    Route::post('/create', 'BarangController@createPost');
    Route::get('/update/{id}', 'BarangController@update')->name('barang.update');
    Route::post('/update/{id}', 'BarangController@updatePost');
    Route::get('/delete/{id}', 'BarangController@delete')->name('barang.delete');

});
  
Route::group([
    'prefix' => 'laporan'
  ], function () {   

    Route::get('/', 'LaporanController@index')->name('laporan.index');
    Route::post('/', 'LaporanController@filter');
});
  

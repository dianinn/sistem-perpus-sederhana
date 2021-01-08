<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::middleware('auth')->group(function () {

    Route::get('beranda', 'HomeController@index')->name('home');
    Route::resource('admin', 'AdminController');
    Route::resource('anggota', 'AnggotaController');
    Route::resource('buku', 'BukuController');
    Route::resource('peminjaman', 'PeminjamanController');
    Route::resource('pengembalian', 'PengembalianController');
    Route::resource('histori', 'HistoriController');
    Route::post('histori/range', 'HistoriController@range')->name('histori.range');
    
    Route::get('laporan' , 'LaporanController@index')->name('laporan.index');
    Route::get('laporan/cetak/{id}' , 'LaporanController@cetak')->name('laporan.cetak');
    Route::get('laporan/cetak_histori' , 'LaporanController@cetak_histori')->name('laporan.cetak.histori');
});

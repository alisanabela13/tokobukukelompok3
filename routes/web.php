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
Route::redirect('/', '/home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//profil
Route::get('/profil', 'ProfilController@index')->name('profil');
Route::put('/profil/{id}', 'ProfilController@update')->name('profil.update');

//user
Route::get('/datauser', 'UserController@index')->name('user');

//buku
Route::get('/databuku', 'BukuController@index')->name('buku');
Route::get('databuku/{id}/detail', 'BukuController@detail')->name('buku.detail');
Route::get('databuku/create', 'BukuController@create')->name('buku.create');
Route::post('databuku/store', 'BukuController@store')->name('buku.store');
Route::get('databuku/{id}', 'BukuController@edit')->name('buku.edit');
Route::put('databuku/{id}/update', 'BukuController@update')->name('buku.update');
Route::delete('databuku/{id}', 'BukuController@destroy')->name('buku.destroy');


//penulis
Route::get('/penulis', 'PenulisController@index')->name('penulis');
Route::get('penulis/create', 'PenulisController@create')->name('penulis.create');
Route::post('penulis/store', 'PenulisController@store')->name('penulis.store');
Route::get('penulis/{id}', 'PenulisController@edit')->name('penulis.edit');
Route::put('penulis/{id}/update', 'PenulisController@update')->name('penulis.update');
Route::delete('penulis/{id}', 'PenulisController@destroy')->name('penulis.destroy');

//penerbit
Route::get('/penerbit', 'PenerbitController@index')->name('penerbit');
Route::get('/penerbit/{id}/detail', 'PenerbitController@detail')->name('penerbit.detail');
Route::get('penerbit/create', 'PenerbitController@create')->name('penerbit.create');
Route::post('penerbit/store', 'PenerbitController@store')->name('penerbit.store');
Route::get('penerbit/{id}', 'PenerbitController@edit')->name('penerbit.edit');
Route::put('penerbit/{id}/update', 'PenerbitController@update')->name('penerbit.update');
Route::delete('penerbit/{id}', 'PenerbitController@destroy')->name('penerbit.destroy');

//Kategori
Route::get('/kategori', 'KategoriController@index')->name('kategori');
Route::get('kategori/create', 'KategoriController@create')->name('kategori.create');
Route::post('kategori/store', 'KategoriController@store')->name('kategori.store');
Route::get('kategori/{id}', 'KategoriController@edit')->name('kategori.edit');
Route::put('kategori/{id}/update', 'KategoriController@update')->name('kategori.update');
Route::delete('kategori/{id}', 'KategoriController@destroy')->name('kategori.destroy');

//Pemasok
Route::get('/pemasok', 'PemasokController@index')->name('pemasok');
Route::get('pemasok/create', 'PemasokController@create')->name('pemasok.create');
Route::post('pemasok/store', 'PemasokController@store')->name('pemasok.store');
Route::get('pemasok/{id}', 'PemasokController@edit')->name('pemasok.edit');
Route::put('pemasok/{id}/update', 'PemasokController@update')->name('pemasok.update');
Route::delete('pemasok/{id}', 'PemasokController@destroy')->name('pemasok.destroy');

//Lokasi
Route::get('lokasi', 'LokasiController@index')->name('lokasi');
Route::post('lokasi/store', 'LokasiController@store')->name('lokasi.store');
Route::put('lokasi/{id}/update', 'LokasiController@update')->name('lokasi.update');
Route::delete('lokasi/{id}', 'LokasiController@destroy')->name('lokasi.destroy');
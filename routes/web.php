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
Route::get('penerbit/create', 'PenerbitController@create')->name('penerbit.create');
Route::post('penerbit/store', 'PenerbitController@store')->name('penerbit.store');
Route::get('penerbit/{id}', 'PenerbitController@edit')->name('penerbit.edit');
Route::put('penerbit/{id}/update', 'PenerbitController@update')->name('penerbit.update');
Route::delete('penerbit/{id}', 'PenerbitController@destroy')->name('penerbit.destroy');

//jenis buku
Route::get('/Kategori', 'KategoriController@index')->name('Kategori');
Route::get('Kategori/create', 'KategoriController@create')->name('Kategori.create');
Route::post('Kategori/store', 'KategoriController@store')->name('Kategori.store');
Route::get('Kategori/{id}', 'KategoriController@edit')->name('Kategori.edit');
Route::put('Kategori/{id}/update', 'KategoriController@update')->name('Kategori.update');
Route::delete('Kategori/{id}', 'KategoriController@destroy')->name('Kategori.destroy');

//Pemasok
Route::get('/Pemasok', 'PemasokController@index')->name('Pemasok');
Route::get('Pemasok/create', 'PemasokController@create')->name('Pemasok.create');
Route::post('Pemasok/store', 'PemasokController@store')->name('Pemasok.store');
Route::get('Pemasok/{id}', 'PemasokController@edit')->name('Pemasok.edit');
Route::put('Pemasok/{id}/update', 'PemasokController@update')->name('Pemasok.update');
Route::delete('Pemasok/{id}', 'PemasokController@destroy')->name('Pemasok.destroy');
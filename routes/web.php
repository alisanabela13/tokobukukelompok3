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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});
Route::redirect('/home', '/');
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
Route::get('/jenisbuku', 'JenisbukuController@index')->name('jenisbuku');
Route::get('jenisbuku/create', 'JenisbukuController@create')->name('jenisbuku.create');
Route::post('jenisbuku/store', 'JenisbukuController@store')->name('jenisbuku.store');
Route::get('jenisbuku/{id}', 'JenisbukuController@edit')->name('jenisbuku.edit');
Route::put('jenisbuku/{id}/update', 'JenisbukuController@update')->name('jenisbuku.update');
Route::delete('jenisbuku/{id}', 'JenisbukuController@destroy')->name('jenisbuku.destroy');

//suplier
Route::get('/suplier', 'SuplierController@index')->name('suplier');
Route::get('suplier/create', 'SuplierController@create')->name('suplier.create');
Route::post('suplier/store', 'SuplierController@store')->name('suplier.store');
Route::get('suplier/{id}', 'SuplierController@edit')->name('suplier.edit');
Route::put('suplier/{id}/update', 'SuplierController@update')->name('suplier.update');
Route::delete('suplier/{id}', 'SuplierController@destroy')->name('suplier.destroy');
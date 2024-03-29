<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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
    return view('auth.login');
});

Route::get('/auth/register', function () {
    return view('auth.register');
});

Auth::routes();

Route::resource('/profile', 'ProfileController');

Route::put('/gantiPassword', 'ProfileController@gantiPassword')->name('gantiPassword');
Route::put('/updateProfile', 'ProfileController@updateProfile')->name('updateProfile');
Route::put('/updatePassword', 'ProfileController@updatePassword')->name('updatePassword');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/beli-barang/cetak', 'BeliBarangController@print');

Route::resource('/category', 'CategoryController');

Route::get('/filter-barang/{tanggal_mulai}/{tanggal_selesai}', 'BarangController@index');
Route::get('/barang/cetak/{tanggal_mulai}/{tanggal_selesai}', 'BarangController@cetak');
Route::get('/barang/cetak/', 'BarangController@cetak');


Route::get('/filter-ambil-barang/{tanggal_mulai}/{tanggal_selesai}', 'AmbilBarangController@index');
Route::get('/ambil-barang/cetak/{tanggal_mulai}/{tanggal_selesai}', 'AmbilBarangController@cetak');
Route::get('/ambil-barang/cetak/', 'AmbilBarangController@cetak');


Route::get('/filter-beli-barang/{tanggal_mulai}/{tanggal_selesai}', 'BeliBarangController@index');
Route::get('/beli-barang/cetak/{tanggal_mulai}/{tanggal_selesai}', 'BeliBarangController@cetak');
Route::get('/beli-barang/cetak/', 'BeliBarangController@cetak');
// Route::get('/barang/view-cetak/{tanggal_mulai}/{tanggal_selesai}', 'BarangController@viewCetak');
// Route::get('/barang/view-cetak/', 'BarangController@viewCetak');




Route::resource('/barang', 'BarangController');
Route::resource('/barang', 'BarangController');
// Route::resource('/barang/cetak', 'BarangController@cetak');

Route::resource('/beli-barang', 'BeliBarangController');

Route::resource('/ambil-barang', 'AmbilBarangController');

Route::resource('/user-list', 'UserListController');

Route::resource('/saldo-awal', 'SaldoAwalController');

Route::get('/saldo-awal/cetak', 'SaldoAwalController@cetak')->name('saldo-awal.cetak');


// Route::post('getDataSelectCategory', ['as'=>'getDataSelectCategory','uses'=>'BarangController@getDataSelectCategory']);
// Route::post('/profile', 'ProfileController@gantiPassword')->name('profile');
// Route::get('/getDataCategory', [BarangController::class,'leftjoin'])->id('barang.leftjoin'); 

// Route::resource('/suara', 'SuaraController');

// Route::post('getDataSelectKelurahan', ['as'=>'getDataSelectKelurahan','uses'=>'SuaraController@getDataSelectKelurahan']);

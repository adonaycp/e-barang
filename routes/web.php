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
    return view('auth.login');
});

Auth::routes();

// Route::get('/register', function () {
//     return view('auth.register');
// });

Route::resource('/suara', 'SuaraController');
Route::resource('/category', 'CategoryController');
Route::resource('/barang', 'BarangController');

Route::post('getDataSelectKelurahan', ['as'=>'getDataSelectKelurahan','uses'=>'SuaraController@getDataSelectKelurahan']);

Route::get('/home', 'HomeController@index')->name('home');

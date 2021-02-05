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

Auth::routes();

// Route::get('/', function () {
//     return view('auth.register');
// });

// Route::get('auth.register', 'RegisterController');


Route::resource('/profile', 'ProfileController');
Route::put('/gantiPassword', 'ProfileController@gantiPassword')->name('gantiPassword');

Route::resource('/suara', 'SuaraController');
Route::resource('/category', 'CategoryController');

Route::resource('/barang', 'BarangController');
Route::resource('/ambil-barang', 'AmbilBarangController');

// Route::post('getDataSelectCategory', ['as'=>'getDataSelectCategory','uses'=>'BarangController@getDataSelectCategory']);
// Route::post('/profile', 'ProfileController@gantiPassword')->name('profile');
// Route::get('/getDataCategory', [BarangController::class,'leftjoin'])->id('barang.leftjoin');


// Route::get('/time', function(){
//     $current = new Carbon();
//     echo $current;
// });

Route::post('getDataSelectKelurahan', ['as'=>'getDataSelectKelurahan','uses'=>'SuaraController@getDataSelectKelurahan']);

Route::get('/home', 'HomeController@index')->name('home');

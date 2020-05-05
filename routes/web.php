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
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/user', 'minef00d@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/saran', 'saranController@index');

Route::resource('produk', 'produkController');
Route::post('/create-saran', 'saranController@store')->name('create_saran');

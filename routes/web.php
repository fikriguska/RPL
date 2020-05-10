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
Route::get('/profile', 'profileController@index');
Route::get('/profile/edit', 'profileController@edit');

// Route::post('/profile/update/{id}', 'profileController@update')->name('edit_profile');
// Route::get('/profile/edit', ['uses' => 'profileController@edit'])->name('edit_profile');
Route::post('/profile/update/{id}',  ['as' => 'edit_profile', 'uses' => 'profileController@update']);

Route::resource('produk', 'produkController');
Route::post('/create-saran', 'saranController@store')->name('create_saran');

Route::get('/admin/user', 'adminUserController@index')->name('admin');
Route::get('/admin/user/delete/{id}', 'adminUserController@destroy');

Route::get('/admin/saran', 'adminSaranController@index');
Route::get('/admin/saran/delete/{id}', 'adminSaranController@destroy');




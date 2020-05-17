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
Route::post('/profile/update/{id}',  'profileController@update')->name('edit_profile');

// Route::resource('produk', 'produkController');

Route::post('/create-saran', 'saranController@store')->name('create_saran');

Route::get('/produk', 'produkController@index');
Route::get('/produk/{id}', 'produkController@show');

Route::get('/consumable', 'produkController@consumable');
Route::get('/not-consumable', 'produkController@notConsumable');


// ADMIN CONTROLLER
Route::get('/admin/user', 'adminUserController@index')->name('admin');
Route::get('/admin/user/edit/{id}', 'adminUserController@edit');
Route::post('/admin/user/update/{id}', 'adminUserController@update')->name('admin_edit_profile');
Route::get('/admin/user/delete/{id}', 'adminUserController@destroy');

Route::get('/admin/saran', 'adminSaranController@index');
Route::get('/admin/saran/delete/{id}', 'adminSaranController@destroy');

Route::get('/admin/produk', 'adminProdukController@index');
Route::get('/admin/produk/edit/{id}', 'adminProdukController@edit');
Route::post('/admin/produk/update/{id}', 'adminProdukController@update')->name('admin_edit_produk');
Route::post('/admin/produk/store', 'adminProdukController@store')->name('admin_create_produk');
Route::get('/admin/produk/create', 'adminProdukController@create');
Route::get('/admin/produk/delete/{id}', 'adminProdukController@destroy');

Route::get('/admin/komposisi', 'adminKomposisiController@index');
Route::get('/admin/komposisi/edit/{id}', 'adminKomposisiController@edit');
Route::post('/admin/komposisi/update/{id}', 'adminKomposisiController@update')->name('admin_edit_komposisi');
Route::post('/admin/komposisi/store', 'adminKomposisiController@store')->name('admin_create_komposisi');
Route::get('/admin/komposisi/create', 'adminKomposisiController@create');
Route::get('/admin/komposisi/delete/{id}', 'adminKomposisiController@destroy');

Route::get('/admin/penyakit', 'adminPenyakitController@index');
Route::get('/admin/penyakit/edit/{id}', 'adminPenyakitController@edit');
Route::post('/admin/penyakit/update/{id}', 'adminPenyakitController@update')->name('admin_edit_penyakit');
Route::post('/admin/penyakit/store', 'adminPenyakitController@store')->name('admin_create_penyakit');
Route::get('/admin/penyakit/create', 'adminPenyakitController@create');
Route::get('/admin/penyakit/delete/{id}', 'adminPenyakitController@destroy');

Route::get('/admin/larangan', 'adminLaranganController@index');
Route::get('/admin/larangan/edit/{id}', 'adminLaranganController@edit');
Route::post('/admin/larangan/update/{id}', 'adminLaranganController@update')->name('admin_edit_larangan');
Route::post('/admin/larangan/store', 'adminLaranganController@store')->name('admin_create_larangan');
Route::get('/admin/larangan/create', 'adminLaranganController@create');
Route::get('/admin/larangan/delete/{id}', 'adminLaranganController@destroy');


Route::get('/json_komposisi', 'komposisiController@komposisi')->name('json_komposisi');
Route::get('/json_penyakit', 'komposisiController@penyakit')->name('json_penyakit');

Route::get('/tes', function () {
    return view('tes');
});







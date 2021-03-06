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

Route::get('/','HomeController@index')->name('home.index');
Route::get('/contact','HomeController@contact')->name('home.contact');
Route::get('/{id}/show','HomeController@show')->name('home.show');
Route::post('/store','HomeController@store')->name('home.store');

Route::group(['namespace' => 'Admin','prefix' => 'admin'],function(){
    //auth login
    Route::get('/login','Auth\\LoginController@showLoginForm')->name('admin.auth.login');
    Route::post('/login','Auth\\LoginController@login')->name('admin.auth.login');
    Route::get('/logout','Auth\\LoginController@logout')->name('admin.auth.logout');

    Route::middleware('auth:admin')->group(function(){
        Route::get('/dashboard','DashboardController@index')->name('dashboard.index');    
    
        // Route::get('//pegawai','PegawaiController@index')->name('admin_pegawai_index');
        Route::resources([
            '/user' => 'UserController'
        ]);

       
    
        Route::resources([
            '/kategori' => 'KategoriController'
        ]);

         Route::resources([
            '/pemesanan' => 'PemesananController'
        ]);

        Route::resources([
            '/properti' => 'PropertiController'
        ]);
        Route::get('/properti/{id}/create_foto','PropertiController@createFoto')->name('properti.createFoto');
        Route::post('/properti/storeFoto','PropertiController@storeFoto')->name('properti.storeFoto');
        Route::get('/properti/{id}/deleteFoto','PropertiController@deleteFoto')->name('properti.deleteFoto');
        
    });
});

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

Route::group(['namespace' => 'Admin','prefix' => 'admin'],function(){
    //auth login
    Route::get('/login','Auth\\LoginController@showLoginForm')->name('admin.auth.login');
    Route::post('/login','Auth\\LoginController@login')->name('admin.auth.login');
    Route::get('/logout','Auth\\LoginController@logout')->name('admin.auth.logout');

    Route::middleware('auth:admin')->group(function(){
        Route::get('/dashboard','DashboardController@index')->name('dashboard.index');
        Route::get('/dashboards','DashboardController@index')->name('admin.dashboard.index');    
    
        // Route::get('//pegawai','PegawaiController@index')->name('admin_pegawai_index');
        Route::resources([
            '/user' => 'UserController'
        ]);

        Route::resources([
            'vaksin' => 'VaksinController'
        ]);
    

        Route::get('/orang_tua/print','OrangTuaController@print')->name('orang_tua.print');
        Route::resources([
            '/orang_tua' => 'OrangTuaController'
        ]);

        Route::get('/bayi/print','BayiController@print')->name('bayi.print');
        Route::resources([
            '/bayi' => 'BayiController'
        ]);
        Route::get('/bayi/{id}/create_data','BayiController@createData')->name('admin.bayi.createData');
        Route::post('/bayi/storeData','BayiController@storeData')->name('admin.bayi.storeData');
        
    });
});

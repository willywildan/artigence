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

Route::get('', function () {
    return view('index');
});
/*Route::get('/admin/pengambilan', function () {
    return view('admin.pengambilan');
});
Route::get('/admin/pintuair', function () {
    return view('admin.pintuair');
});
Route::get('/admin/laporan', function () {
    return view('admin.laporan');
});
Route::get('/admin/curah', function () {
    return view('admin.curah');
});*/

Route::get('/pintu','MainController@pintu');

Route::get('/utama','MainController@index');

Route::get('pintu/{id_pintu_air}/lihat','MainController@lihat');

Route::get('/curah_hujan','MainController@curah_hujan');

Route::get('/laporan','MainController@laporan');

Route::get('laporan/{id_pintu_air}/laporan','MainController@lihat_laporan');

Route::get('/keputusan','MainController@keputusan');
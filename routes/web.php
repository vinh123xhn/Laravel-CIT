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


Route::get('/login', function () {
    return view('admin.login');
});
Route::post('/login', 'Admin\LoginController@login')->name('post.login');
Route::get('/logout', 'Admin\LoginController@logout')->name('post.logout');


Route::group(['namespace' => 'Admin', 'middleware' => ['check-admin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

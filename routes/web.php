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

    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('admin.user.list');
        Route::get('/form', 'UserController@getForm')->name('admin.user.form.get');
        Route::post('/form', 'UserController@saveForm')->name('admin.user.form.post');
    });

    Route::group(['namespace' => 'Medical', 'prefix' => 'medical'], function () {
        Route::group(['prefix' => 'hospital'], function () {
            Route::get('/', 'HospitalController@index')->name('admin.hospital.list');
            Route::get('/form', 'HospitalController@getForm')->name('admin.hospital.form.get');
            Route::post('/form', 'HospitalController@saveForm')->name('admin.hospital.form.post');
        });
        Route::group(['prefix' => 'type-hospital'], function () {
            Route::get('/', 'TypeOfHospitalController@index')->name('admin.type-hospital.list');
            Route::get('/form', 'TypeOfHospitalController@getForm')->name('admin.type-hospital.form.get');
            Route::post('/form', 'TypeOfHospitalController@saveForm')->name('admin.type-hospital.form.post');
        });

        Route::group(['prefix' => 'doctor'], function () {
            Route::get('/', 'DoctorController@index')->name('admin.doctor.list');
            Route::get('/form', 'DoctorController@getForm')->name('admin.doctor.form.get');
            Route::post('/form', 'DoctorController@saveForm')->name('admin.doctor.form.post');
        });

        Route::group(['prefix' => 'children'], function () {
            Route::get('/', 'ChildrenController@index')->name('admin.children.list');
            Route::get('/form', 'ChildrenController@getForm')->name('admin.children.form.get');
            Route::post('/form', 'ChildrenController@saveForm')->name('admin.children.form.post');
        });
    });
});

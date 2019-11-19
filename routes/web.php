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



Route::group(['prefix' => 'auth', 'namespace' => 'Admin'], function () {
    Route::get('login', function () {
        return view('auth.login');
    })->name('auth.getLogin');
    Route::post('login', 'LoginController@login')->name('auth.postLogin');
    Route::get('logout', 'LoginController@logout')->name('auth.postLogout');

    Route::get('forgot-password', function () {
        return view('auth.forgot-password');
    })->name('auth.getForgotPassword');
    Route::post('forgot-password', 'ForgotPasswordController@resetPassword')->name('auth.sendMail');

    Route::get('reset-password/{token}', 'ForgotPasswordController@getFormResetPassword')->name('auth.getRecoverPassword');
    Route::post('reset-password/{token}', 'ForgotPasswordController@resetPasswordChange')->name('auth.postRecoverPassword');
});


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
            Route::get('/edit/{id}', 'HospitalController@editForm')->name('admin.hospital.form.edit');
            Route::post('/update/{id}', 'HospitalController@updateForm')->name('admin.hospital.form.update');
        });
        Route::group(['prefix' => 'type-hospital'], function () {
            Route::get('/', 'TypeOfHospitalController@index')->name('admin.type-hospital.list');
            Route::get('/form', 'TypeOfHospitalController@getForm')->name('admin.type-hospital.form.get');
            Route::post('/form', 'TypeOfHospitalController@saveForm')->name('admin.type-hospital.form.post');
            Route::get('/edit/{id}', 'TypeOfHospitalController@editForm')->name('admin.type-hospital.form.edit');
            Route::post('/update/{id}', 'TypeOfHospitalController@updateForm')->name('admin.type-hospital.form.update');
        });

        Route::group(['prefix' => 'doctor'], function () {
            Route::get('/', 'DoctorController@index')->name('admin.doctor.list');
            Route::get('/form', 'DoctorController@getForm')->name('admin.doctor.form.get');
            Route::post('/form', 'DoctorController@saveForm')->name('admin.doctor.form.post');
            Route::get('/edit/{id}', 'DoctorController@editForm')->name('admin.doctor.form.edit');
            Route::post('/update/{id}', 'DoctorController@updateForm')->name('admin.doctor.form.update');
        });

        Route::group(['prefix' => 'children'], function () {
            Route::get('/', 'ChildrenController@index')->name('admin.children.list');
            Route::get('/form', 'ChildrenController@getForm')->name('admin.children.form.get');
            Route::post('/form', 'ChildrenController@saveForm')->name('admin.children.form.post');
            Route::get('/edit/{id}', 'ChildrenController@editForm')->name('admin.children.form.edit');
            Route::post('/update/{id}', 'ChildrenController@updateForm')->name('admin.children.form.update');
        });
    });
});

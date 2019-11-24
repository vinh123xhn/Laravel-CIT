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

Route::get('/ajax-get-commune', function () {
    $cat_id = \Illuminate\Support\Facades\Input::get('cat_id');

    $commune = \App\Models\Commune::where('district_id', '=', $cat_id)->get();

    return Response::json($commune);
});

Route::group(['namespace' => 'Admin', 'middleware' => ['check-admin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('admin.user.list');
        Route::get('/detail', 'UserController@detail')->name('admin.user.detail');
        Route::get('/form', 'UserController@getForm')->name('admin.user.form.get');
        Route::post('/form', 'UserController@saveForm')->name('admin.user.form.post');
        Route::get('/edit/{id}', 'UserController@editForm')->name('admin.user.form.edit');
        Route::post('/update/{id}', 'UserController@updateForm')->name('admin.user.form.update');
        Route::get('/delete/{id}', 'UserController@delete')->name('admin.user.delete');
    });

    Route::group(['namespace' => 'Area', 'prefix' => 'area'], function () {
        Route::group(['prefix' => 'district'], function () {
            Route::get('/', 'DistrictController@index')->name('admin.district.list');
            Route::get('/form', 'DistrictController@getForm')->name('admin.district.form.get');
            Route::post('/form', 'DistrictController@saveForm')->name('admin.district.form.post');
            Route::get('/edit/{id}', 'DistrictController@editForm')->name('admin.district.form.edit');
            Route::post('/update/{id}', 'DistrictController@updateForm')->name('admin.district.form.update');
            Route::get('/delete/{id}', 'DistrictController@delete')->name('admin.district.delete');

            Route::group(['prefix' => '{district_id}/commune'], function () {
                Route::get('/', 'CommuneController@index')->name('admin.commune.list');
                Route::get('/form', 'CommuneController@getForm')->name('admin.commune.form.get');
                Route::post('/form', 'CommuneController@saveForm')->name('admin.commune.form.post');
                Route::get('/edit/{id}', 'CommuneController@editForm')->name('admin.commune.form.edit');
                Route::post('/update/{id}', 'CommuneController@updateForm')->name('admin.commune.form.update');
                Route::get('/delete/{id}', 'CommuneController@delete')->name('admin.commune.delete');
            });
        });
    });

    Route::group(['namespace' => 'Education', 'prefix' => 'education'], function () {
        Route::group(['prefix' => 'school'], function () {
            Route::get('/', 'SchoolController@index')->name('admin.school.list');
            Route::get('/detail/{id}', 'SchoolController@index')->name('admin.school.detail');
            Route::get('/form', 'SchoolController@getForm')->name('admin.school.form.get');
            Route::post('/form', 'SchoolController@saveForm')->name('admin.school.form.post');
            Route::get('/edit/{id}', 'SchoolController@editForm')->name('admin.school.form.edit');
            Route::post('/update/{id}', 'SchoolController@updateForm')->name('admin.school.form.update');
            Route::get('/delete/{id}', 'SchoolController@delete')->name('admin.school.delete');
        });

        Route::group(['prefix' => 'teacher'], function () {
            Route::get('/', 'TeacherController@index')->name('admin.teacher.list');
            Route::get('/detail/{id}', 'TeacherController@detail')->name('admin.teacher.detail');
            Route::get('/form', 'TeacherController@getForm')->name('admin.teacher.form.get');
            Route::post('/form', 'TeacherController@saveForm')->name('admin.teacher.form.post');
            Route::get('/edit/{id}', 'TeacherController@editForm')->name('admin.teacher.form.edit');
            Route::post('/update/{id}', 'TeacherController@updateForm')->name('admin.teacher.form.update');
            Route::get('/delete/{id}', 'TeacherController@delete')->name('admin.teacher.delete');
        });

        Route::group(['prefix' => 'student'], function () {
            Route::get('/', 'StudentController@index')->name('admin.student.list');
            Route::get('/detail/{id}', 'StudentController@index')->name('admin.student.detail');
            Route::get('/form', 'StudentController@getForm')->name('admin.student.form.get');
            Route::post('/form', 'StudentController@saveForm')->name('admin.student.form.post');
            Route::get('/edit/{id}', 'StudentController@editForm')->name('admin.student.form.edit');
            Route::post('/update/{id}', 'StudentController@updateForm')->name('admin.student.form.update');
            Route::get('/delete/{id}', 'StudentController@delete')->name('admin.student.delete');
        });
    });
});

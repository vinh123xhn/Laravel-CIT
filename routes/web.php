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


use Carbon\Carbon;

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
Route::group(['namespace' => 'Chart', 'prefix' => '/'], function () {
    Route::get('/ajax-get-school', 'SchoolChart@chartSchool1')->name('chart.school.1');
    Route::get('/ajax-get-school-2', 'SchoolChart@chartSchool2')->name('chart.school.2');

    Route::get('/ajax-get-personnel', 'PersonnelChart@chartPersonnel1')->name('chart.personnel.1');
    Route::get('/ajax-get-personnel-2', 'PersonnelChart@chartPersonnel2')->name('chart.personnel.2');
    Route::get('/ajax-get-personnel-3', 'PersonnelChart@chartPersonnel3')->name('chart.personnel.3');

    Route::get('/ajax-get-student', 'StudentChart@chartStudent1')->name('chart.student.1');
    Route::get('/ajax-get-student-2', 'StudentChart@chartStudent2')->name('chart.student.2');
});

Route::get('/ajax-get-type-student', function () {
    $cat_id = \Illuminate\Support\Facades\Input::get('cat_id');

    switch ($cat_id) {
        case 1:
            $data = \App\Models\School::where('type_school', '=', 1)->get();
            break;
        case 2:
            $data = \App\Models\School::where('type_school', '=', 2)->get();
            break;
        case 3:
            $data = \App\Models\School::where('type_school', '=', 3)->get();
            break;
        case 4:
            $data = \App\Models\School::where('type_school', '=', 4)->get();
            break;
        case 5:
            $data = \App\Models\School::where('type_school', '=', 5)->get();
            break;
        case 6:
            $data = \App\Models\School::where('type_school', '=', 6)->get();
            break;
        case 7:
            $data = \App\Models\School::where('type_school', '=', 7)->get();
            break;
    }

    return Response::json($data);
});

Route::group(['namespace' => 'Admin', 'middleware' => ['check-admin'], 'prefix' => '/'], function () {
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
        Route::group(['prefix' => 'school', 'namespace' => 'School'], function () {
            Route::group(['prefix' => 'nursery'], function () {
                Route::get('/', 'NurserySchoolController@index')->name('admin.school.nursery.list');
                Route::get('/filter', 'NurserySchoolController@filter')->name('admin.school.nursery.filter');
                Route::get('/form', 'NurserySchoolController@getForm')->name('admin.school.nursery.form.get');
                Route::post('/form', 'NurserySchoolController@saveForm')->name('admin.school.nursery.form.post');
                Route::get('/edit/{id}', 'NurserySchoolController@editForm')->name('admin.school.nursery.form.edit');
                Route::post('/update/{id}', 'NurserySchoolController@updateForm')->name('admin.school.nursery.form.update');
                Route::get('/delete/{id}', 'NurserySchoolController@delete')->name('admin.school.nursery.delete');
                Route::get('/export-excel', 'NurserySchoolController@exportData')->name('admin.school.nursery.export-excel');
            });

            Route::group(['prefix' => 'primary'], function () {
                Route::get('/', 'PrimarySchoolController@index')->name('admin.school.primary.list');
                Route::get('/filter', 'PrimarySchoolController@filter')->name('admin.school.primary.filter');
                Route::get('/form', 'PrimarySchoolController@getForm')->name('admin.school.primary.form.get');
                Route::post('/form', 'PrimarySchoolController@saveForm')->name('admin.school.primary.form.post');
                Route::get('/edit/{id}', 'PrimarySchoolController@editForm')->name('admin.school.primary.form.edit');
                Route::post('/update/{id}', 'PrimarySchoolController@updateForm')->name('admin.school.primary.form.update');
                Route::get('/delete/{id}', 'PrimarySchoolController@delete')->name('admin.school.primary.delete');
                Route::get('/export-excel', 'PrimarySchoolController@exportData')->name('admin.school.primary.export-excel');
            });

            Route::group(['prefix' => 'junior-high'], function () {
                Route::get('/', 'JuniorHighSchoolController@index')->name('admin.school.junior_high.list');
                Route::get('/filter', 'JuniorHighSchoolController@filter')->name('admin.school.junior_high.filter');
                Route::get('/form', 'JuniorHighSchoolController@getForm')->name('admin.school.junior_high.form.get');
                Route::post('/form', 'JuniorHighSchoolController@saveForm')->name('admin.school.junior_high.form.post');
                Route::get('/edit/{id}', 'JuniorHighSchoolController@editForm')->name('admin.school.junior_high.form.edit');
                Route::post('/update/{id}', 'JuniorHighSchoolController@updateForm')->name('admin.school.junior_high.form.update');
                Route::get('/delete/{id}', 'JuniorHighSchoolController@delete')->name('admin.school.junior_high.delete');
                Route::get('/export-excel', 'JuniorHighSchoolController@exportData')->name('admin.school.junior_high.export-excel');
            });

            Route::group(['prefix' => 'high'], function () {
                Route::get('/', 'HighSchoolController@index')->name('admin.school.high.list');
                Route::get('/filter', 'HighSchoolController@filter')->name('admin.school.high.filter');
                Route::get('/form', 'HighSchoolController@getForm')->name('admin.school.high.form.get');
                Route::post('/form', 'HighSchoolController@saveForm')->name('admin.school.high.form.post');
                Route::get('/edit/{id}', 'HighSchoolController@editForm')->name('admin.school.high.form.edit');
                Route::post('/update/{id}', 'HighSchoolController@updateForm')->name('admin.school.high.form.update');
                Route::get('/delete/{id}', 'HighSchoolController@delete')->name('admin.school.high.delete');
                Route::get('/export-excel', 'HighSchoolController@exportData')->name('admin.school.high.export-excel');
            });

            Route::group(['prefix' => 'primary-junior-high'], function () {
                Route::get('/', 'PrimaryJuniorHighSchoolController@index')->name('admin.school.primary_junior_high.list');
                Route::get('/filter', 'PrimaryJuniorHighSchoolController@filter')->name('admin.school.primary_junior_high.filter');
                Route::get('/form', 'PrimaryJuniorHighSchoolController@getForm')->name('admin.school.primary_junior_high.form.get');
                Route::post('/form', 'PrimaryJuniorHighSchoolController@saveForm')->name('admin.school.primary_junior_high.form.post');
                Route::get('/edit/{id}', 'PrimaryJuniorHighSchoolController@editForm')->name('admin.school.primary_junior_high.form.edit');
                Route::post('/update/{id}', 'PrimaryJuniorHighSchoolController@updateForm')->name('admin.school.primary_junior_high.form.update');
                Route::get('/delete/{id}', 'PrimaryJuniorHighSchoolController@delete')->name('admin.school.primary_junior_high.delete');
                Route::get('/export-excel', 'PrimaryJuniorHighSchoolController@exportData')->name('admin.school.primary_junior_high.export-excel');
            });

            Route::group(['prefix' => 'junior-and-high'], function () {
                Route::get('/', 'JuniorAndHighSchoolController@index')->name('admin.school.junior_and_high.list');
                Route::get('/filter', 'JuniorAndHighSchoolController@filter')->name('admin.school.junior_and_high.filter');
                Route::get('/form', 'JuniorAndHighSchoolController@getForm')->name('admin.school.junior_and_high.form.get');
                Route::post('/form', 'JuniorAndHighSchoolController@saveForm')->name('admin.school.junior_and_high.form.post');
                Route::get('/edit/{id}', 'JuniorAndHighSchoolController@editForm')->name('admin.school.junior_and_high.form.edit');
                Route::post('/update/{id}', 'JuniorAndHighSchoolController@updateForm')->name('admin.school.junior_and_high.form.update');
                Route::get('/delete/{id}', 'JuniorAndHighSchoolController@delete')->name('admin.school.junior_and_high.delete');
                Route::get('/export-excel', 'JuniorAndHighSchoolController@exportData')->name('admin.school.junior_and_high.export-excel');
            });

            Route::group(['prefix' => 'cec'], function () {
                Route::get('/', 'CecSchoolController@index')->name('admin.school.cec.list');
                Route::get('/filter', 'CecSchoolController@filter')->name('admin.school.cec.filter');
                Route::get('/form', 'CecSchoolController@getForm')->name('admin.school.cec.form.get');
                Route::post('/form', 'CecSchoolController@saveForm')->name('admin.school.cec.form.post');
                Route::get('/edit/{id}', 'CecSchoolController@editForm')->name('admin.school.cec.form.edit');
                Route::post('/update/{id}', 'CecSchoolController@updateForm')->name('admin.school.cec.form.update');
                Route::get('/delete/{id}', 'CecSchoolController@delete')->name('admin.school.cec.delete');
                Route::get('/export-excel', 'CecSchoolController@exportData')->name('admin.school.cec.export-excel');
            });
        });

        Route::group(['prefix' => 'personnel', 'namespace' => 'Personnel'], function () {
            Route::group(['prefix' => 'manager'], function () {
                Route::get('/', 'ManagerController@index')->name('admin.personnel.manager.list');
                Route::get('/filter', 'ManagerController@filter')->name('admin.personnel.manager.filter');
                Route::get('/form', 'ManagerController@getForm')->name('admin.personnel.manager.form.get');
                Route::post('/form', 'ManagerController@saveForm')->name('admin.personnel.manager.form.post');
                Route::get('/edit/{id}', 'ManagerController@editForm')->name('admin.personnel.manager.form.edit');
                Route::post('/update/{id}', 'ManagerController@updateForm')->name('admin.personnel.manager.form.update');
                Route::get('/delete/{id}', 'ManagerController@delete')->name('admin.personnel.manager.delete');
                Route::get('/export-excel', 'ManagerController@exportData')->name('admin.personnel.manager.export-excel');
            });

            Route::group(['prefix' => 'teacher'], function () {
                Route::get('/', 'TeacherController@index')->name('admin.personnel.teacher.list');
                Route::get('/filter', 'TeacherController@filter')->name('admin.personnel.teacher.filter');
                Route::get('/form', 'TeacherController@getForm')->name('admin.personnel.teacher.form.get');
                Route::post('/form', 'TeacherController@saveForm')->name('admin.personnel.teacher.form.post');
                Route::get('/edit/{id}', 'TeacherController@editForm')->name('admin.personnel.teacher.form.edit');
                Route::post('/update/{id}', 'TeacherController@updateForm')->name('admin.personnel.teacher.form.update');
                Route::get('/delete/{id}', 'TeacherController@delete')->name('admin.personnel.teacher.delete');
                Route::get('/export-excel', 'TeacherController@exportData')->name('admin.personnel.teacher.export-excel');
            });

            Route::group(['prefix' => 'employee'], function () {
                Route::get('/', 'EmployeeController@index')->name('admin.personnel.employee.list');
                Route::get('/filter', 'EmployeeController@filter')->name('admin.personnel.employee.filter');
                Route::get('/form', 'EmployeeController@getForm')->name('admin.personnel.employee.form.get');
                Route::post('/form', 'EmployeeController@saveForm')->name('admin.personnel.employee.form.post');
                Route::get('/edit/{id}', 'EmployeeController@editForm')->name('admin.personnel.employee.form.edit');
                Route::post('/update/{id}', 'EmployeeController@updateForm')->name('admin.personnel.employee.form.update');
                Route::get('/delete/{id}', 'EmployeeController@delete')->name('admin.personnel.employee.delete');
                Route::get('/export-excel', 'EmployeeController@exportData')->name('admin.personnel.employee.export-excel');
            });
        });

        Route::group(['prefix' => 'student'], function () {
            Route::get('/', 'StudentController@index')->name('admin.student.list');
            Route::get('/filter', 'StudentController@filter')->name('admin.student.filter');
            Route::get('/form', 'StudentController@getForm')->name('admin.student.form.get');
            Route::post('/form', 'StudentController@saveForm')->name('admin.student.form.post');
            Route::get('/edit/{id}', 'StudentController@editForm')->name('admin.student.form.edit');
            Route::post('/update/{id}', 'StudentController@updateForm')->name('admin.student.form.update');
            Route::get('/delete/{id}', 'StudentController@delete')->name('admin.student.delete');
            Route::get('/export-excel', 'StudentController@exportData')->name('admin.student.export-excel');
        });
    });
});

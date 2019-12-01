<?php

namespace App\Http\Controllers\Admin\Education\School;

use App\Models\Commune;
use App\Models\District;
use App\Http\Controllers\Controller;
use App\Models\JuniorAndHighSchool;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JuniorAndHighSchoolController extends Controller
{
    public function __construct()
{
    $this->middleware('check-admin-writer-permission');
}

    public function index() {
    $schools = School::where('type_school', '=', 6)->with('commune','district','junior_and_high')->get();
    $districts = District::pluck('name', 'id');
    return view('admin.education.school.junior_and_high.list')->with(compact('schools', 'districts'));
}
    public function filter(Request $request) {
        $districts = District::pluck('name', 'id');
        $schools = School::where('type_school', '=', 6)->with('commune','district','primary');
        $filter = [];
        if ($request->district_id) {
            $filter['district_id'] = $request->district_id;
        }
        if ($request->commune_id) {
            $filter['commune_id'] = $request->commune_id;
        }
        $schools = $schools->where($filter)->get();
        return view('admin.education.school.junior_and_high.list')->with(compact('schools', 'districts'));
    }

    public function getForm() {
    $districts = District::pluck('name', 'id');
    return view('admin.education.school.junior_and_high.form')->with(compact('districts'));
}

    public function saveForm(Request $request) {
    $rules = [
        'name' => 'required|max:100',
        'district_id' => 'required',
        'commune_id' => 'required',
        'address' => 'required',
        'phone' => 'numeric|min:10|min:20',
        'email' => 'email|max:100',
        'name_of_principal' => 'required|max:30',
        'total_of_class' => 'numeric',
        'total_of_grade_6' => 'numeric',
        'total_of_grade_7' => 'numeric',
        'total_of_grade_8' => 'numeric',
        'total_of_grade_9' => 'numeric',
        'total_of_grade_10' => 'numeric',
        'total_of_grade_11' => 'numeric',
        'total_of_grade_12' => 'numeric',
        'total_of_student' => 'numeric',
        'total_of_student_6' => 'numeric',
        'total_of_student_7' => 'numeric',
        'total_of_student_8' => 'numeric',
        'total_of_student_9' => 'numeric',
        'total_of_student_10' => 'numeric',
        'total_of_student_11' => 'numeric',
        'total_of_student_12' => 'numeric',
        'total_of_all_employees' => 'numeric',
        'total_of_manager' => 'numeric',
        'total_of_teacher' => 'numeric',
        'total_of_employees' => 'numeric',
        'total_classroom' => 'numeric',
        'total_function_room' => 'numeric',
        'total_subject_room' => 'numeric',
        'total_device_full' => 'numeric',
        'total_device_not_full' => 'numeric',
    ];

    $messages = [
        'name.required' => 'tên trường không được để trống',
        'name.max' => 'tên trường không được quá 255 ký tự',
        'phone.numeric' => 'Số điện thoại phải nhập số',
        'phone.max' => 'Số điện thoại nhập tối đa 20 ký tự',
        'phone.min' => 'Số điện thoại nhập tối thiểu 10 ký tự',
        'district_id.required' => 'quận/huyện không được để trống',
        'commune_id.required' => 'phường/xã không được để trống',
        'address.required' => 'địa chỉ không được để trống',
        'email.email' => 'email phải là dạng email',
        'email.max' => 'email nhập tối đa 100 ký tự',
        'name_of_principal.required' => 'tên hiểu trưởng không được để trống',
        'name_of_principal.max' => 'tên hiệu trưởng nhập tối đa 30 ký tự',
        'total_of_class.numeric' => 'Trường này phải nhập số',
        'total_of_grade_6.numeric' => 'Trường này phải nhập số',
        'total_of_grade_7.numeric' => 'Trường này phải nhập số',
        'total_of_grade_8.numeric' => 'Trường này phải nhập số',
        'total_of_grade_9.numeric' => 'Trường này phải nhập số',
        'total_of_grade_10.numeric' => 'Trường này phải nhập số',
        'total_of_grade_11.numeric' => 'Trường này phải nhập số',
        'total_of_grade_12.numeric' => 'Trường này phải nhập số',
        'total_of_student.numeric' => 'Trường này phải nhập số',
        'total_of_student_6.numeric' => 'Trường này phải nhập số',
        'total_of_student_7.numeric' => 'Trường này phải nhập số',
        'total_of_student_8.numeric' => 'Trường này phải nhập số',
        'total_of_student_9.numeric' => 'Trường này phải nhập số',
        'total_of_student_10.numeric' => 'Trường này phải nhập số',
        'total_of_student_11.numeric' => 'Trường này phải nhập số',
        'total_of_student_12.numeric' => 'Trường này phải nhập số',
        'total_of_all_employees.numeric' => 'Trường này phải nhập số',
        'total_of_manager.numeric' => 'Trường này phải nhập số',
        'total_of_teacher.numeric' => 'Trường này phải nhập số',
        'total_of_employees.numeric' => 'Trường này phải nhập số',
        'total_classroom.numeric' => 'Trường này phải nhập số',
        'total_function_room.numeric' => 'Trường này phải nhập số',
        'total_subject_room.numeric' => 'Trường này phải nhập số',
        'total_device_full.numeric' => 'Trường này phải nhập số',
        'total_device_not_full.numeric' => 'Trường này phải nhập số',
    ];
    $validator = Validator::make($request->all(), $rules, $messages);
    if ($validator->fails()) {
        // tra ve true neu validate bi loi
        return redirect()->back()->withErrors($validator)->withInput($request->input());
    } else {
        $request['type_school'] = 6;
        $school = School::create($request->all());
        $request['school_id'] = $school->id;
        JuniorAndHighSchool::create($request->all());
        return redirect()->route('admin.school.junior_and_high.list');
    }
}

    public function editForm($id) {
    $districts = District::pluck('name', 'id');
    $school = School::FindOrFail($id);
    $communes = Commune::where('district_id', '=', $school->district_id)->pluck('name', 'id');
    $data = JuniorAndHighSchool::where('school_id', '=', $id)->first();
    return view('admin.education.school.junior_and_high.edit', compact('school', 'districts', 'communes', 'data'));
}

    public function updateForm(Request $request, $id) {
    $rules = [
        'name' => 'required|max:100',
        'district_id' => 'required',
        'commune_id' => 'required',
        'address' => 'required',
        'phone' => 'numeric|min:10|min:20',
        'email' => 'email|max:100',
        'name_of_principal' => 'required|max:30',
        'total_of_class' => 'numeric',
        'total_of_grade_6' => 'numeric',
        'total_of_grade_7' => 'numeric',
        'total_of_grade_8' => 'numeric',
        'total_of_grade_9' => 'numeric',
        'total_of_grade_10' => 'numeric',
        'total_of_grade_11' => 'numeric',
        'total_of_grade_12' => 'numeric',
        'total_of_student' => 'numeric',
        'total_of_student_6' => 'numeric',
        'total_of_student_7' => 'numeric',
        'total_of_student_8' => 'numeric',
        'total_of_student_9' => 'numeric',
        'total_of_student_10' => 'numeric',
        'total_of_student_11' => 'numeric',
        'total_of_student_12' => 'numeric',
        'total_of_all_employees' => 'numeric',
        'total_of_manager' => 'numeric',
        'total_of_teacher' => 'numeric',
        'total_of_employees' => 'numeric',
        'total_classroom' => 'numeric',
        'total_function_room' => 'numeric',
        'total_subject_room' => 'numeric',
        'total_device_full' => 'numeric',
        'total_device_not_full' => 'numeric',
    ];

    $messages = [
        'name.required' => 'tên trường không được để trống',
        'name.max' => 'tên trường không được quá 255 ký tự',
        'phone.numeric' => 'Số điện thoại phải nhập số',
        'phone.max' => 'Số điện thoại nhập tối đa 20 ký tự',
        'phone.min' => 'Số điện thoại nhập tối thiểu 10 ký tự',
        'district_id.required' => 'quận/huyện không được để trống',
        'commune_id.required' => 'phường/xã không được để trống',
        'address.required' => 'địa chỉ không được để trống',
        'email.email' => 'email phải là dạng email',
        'email.max' => 'email nhập tối đa 100 ký tự',
        'name_of_principal.required' => 'tên hiểu trưởng không được để trống',
        'name_of_principal.max' => 'tên hiệu trưởng nhập tối đa 30 ký tự',
        'total_of_class.numeric' => 'Trường này phải nhập số',
        'total_of_grade_6.numeric' => 'Trường này phải nhập số',
        'total_of_grade_7.numeric' => 'Trường này phải nhập số',
        'total_of_grade_8.numeric' => 'Trường này phải nhập số',
        'total_of_grade_9.numeric' => 'Trường này phải nhập số',
        'total_of_grade_10.numeric' => 'Trường này phải nhập số',
        'total_of_grade_11.numeric' => 'Trường này phải nhập số',
        'total_of_grade_12.numeric' => 'Trường này phải nhập số',
        'total_of_student.numeric' => 'Trường này phải nhập số',
        'total_of_student_6.numeric' => 'Trường này phải nhập số',
        'total_of_student_7.numeric' => 'Trường này phải nhập số',
        'total_of_student_8.numeric' => 'Trường này phải nhập số',
        'total_of_student_9.numeric' => 'Trường này phải nhập số',
        'total_of_student_10.numeric' => 'Trường này phải nhập số',
        'total_of_student_11.numeric' => 'Trường này phải nhập số',
        'total_of_student_12.numeric' => 'Trường này phải nhập số',
        'total_of_all_employees.numeric' => 'Trường này phải nhập số',
        'total_of_manager.numeric' => 'Trường này phải nhập số',
        'total_of_teacher.numeric' => 'Trường này phải nhập số',
        'total_of_employees.numeric' => 'Trường này phải nhập số',
        'total_classroom.numeric' => 'Trường này phải nhập số',
        'total_function_room.numeric' => 'Trường này phải nhập số',
        'total_subject_room.numeric' => 'Trường này phải nhập số',
        'total_device_full.numeric' => 'Trường này phải nhập số',
        'total_device_not_full.numeric' => 'Trường này phải nhập số',
    ];
    $validator = Validator::make($request->all(), $rules, $messages);
    if ($validator->fails()) {
        // tra ve true neu validate bi loi
        return redirect()->back()->withErrors($validator)->withInput($request->input());
    } else {
        School::where('id', '=', $id)->update([
            'name' => $request->name,
            'district_id' => $request->district_id,
            'commune_id' => $request->commune_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'acreage' => $request->acreage,
            'name_of_principal' => $request->name_of_principal,
        ]);
        $update = $request->all();
        unset($update['_token']);
        unset($update['name']);
        unset($update['district_id']);
        unset($update['commune_id']);
        unset($update['address']);
        unset($update['phone']);
        unset($update['email']);
        unset($update['website']);
        unset($update['acreage']);
        unset($update['name_of_principal']);
        JuniorAndHighSchool::where('school_id', '=', $id)->update($update);
        return redirect()->route('admin.school.junior_and_high.list');
    }
}

    public function exportData() {
//        field => title
        $exportFields = [
            'name' => __('Tên trường'),
            'district_id' => __('Quận/ huyện'),
            'commune_id' => __('Phường/ xã'),
            'address' => __('địa chỉ'),
            'phone' => __('số điện thoại'),
            'email' => __('thư điện tử'),
            'website' => __('website'),
            'acreage' => __('diện tích(m2)'),
            'name_of_principal' => __('Tên hiệu trưởng'),
            'total_of_class' => __('tổng số lớp học'),
            'total_of_grade_6' => __('Tổng số lớp 6'),
            'total_of_grade_7' => __('Tổng số lớp 7'),
            'total_of_grade_8' => __('Tổng số lớp 8'),
            'total_of_grade_9' => __('Tổng số lớp 9'),
            'total_of_grade_10' => __('Tổng số lớp 10'),
            'total_of_grade_11' => __('Tổng số lớp 11'),
            'total_of_grade_12' => __('Tổng số lớp 12'),
            'total_of_student' => __('Tổng số học sinh'),
            'total_of_student_6' => __('Tổng số học sinh 6'),
            'total_of_student_7' => __('Tổng số học sinh 7'),
            'total_of_student_8' => __('Tổng số học sinh 8'),
            'total_of_student_9' => __('Tổng số học sinh 9'),
            'total_of_student_10' => __('Tổng số học sinh 10'),
            'total_of_student_11' => __('Tổng số học sinh 11'),
            'total_of_student_12' => __('Tổng số học sinh 12'),
            'total_of_all_employees' => __('Tổng số cán bộ, giáo viên, nhân viên'),
            'total_of_teacher' => __('Tổng số giáo viên'),
            'total_of_employees' => __('Tổng số nhân viên'),
            'total_classroom' => __('Tổng số phòng học'),
            'total_function_room' => __('Tổng số phòng học chức năng'),
            'total_subject_room' => __('Tổng số phòng học bộ môn'),
        ];
        $schools = School::where('type_school', '=', 6)->with('district', 'commune', 'junior_and_high')->orderBy('created_at', 'desc')->get();

        $data = [];
        foreach ($schools as $item) {
            $item['district_id'] = $item['district'] ['name'];
            $item['commune_id'] = $item['commune'] ['name'];
            $item['total_of_class'] = $item['junior_and_high'] ['total_of_class'];
            $item['total_of_grade_6'] = $item['junior_and_high'] ['total_of_grade_6'];
            $item['total_of_grade_7'] = $item['junior_and_high'] ['total_of_grade_7'];
            $item['total_of_grade_8'] = $item['junior_and_high'] ['total_of_grade_8'];
            $item['total_of_grade_9'] = $item['junior_and_high'] ['total_of_grade_9'];
            $item['total_of_grade_10'] = $item['junior_and_high'] ['total_of_grade_10'];
            $item['total_of_grade_11'] = $item['junior_and_high'] ['total_of_grade_11'];
            $item['total_of_grade_12'] = $item['junior_and_high'] ['total_of_grade_12'];
            $item['total_of_student'] = $item['junior_and_high'] ['total_of_student'];
            $item['total_of_student_6'] = $item['junior_and_high'] ['total_of_student_6'];
            $item['total_of_student_7'] = $item['junior_and_high'] ['total_of_student_7'];
            $item['total_of_student_8'] = $item['junior_and_high'] ['total_of_student_8'];
            $item['total_of_student_9'] = $item['junior_and_high'] ['total_of_student_9'];
            $item['total_of_student_10'] = $item['junior_and_high'] ['total_of_student_10'];
            $item['total_of_student_11'] = $item['junior_and_high'] ['total_of_student_11'];
            $item['total_of_student_12'] = $item['junior_and_high'] ['total_of_student_12'];
            $item['total_of_all_employees'] = $item['junior_and_high'] ['total_of_all_employees'];
            $item['total_of_manager'] = $item['junior_and_high'] ['total_of_manager'];
            $item['total_of_teacher'] = $item['junior_and_high'] ['total_of_teacher'];
            $item['total_of_employees'] = $item['junior_and_high'] ['total_of_employees'];
            $item['total_classroom'] = $item['junior_and_high'] ['total_classroom'];
            $item['total_function_room'] = $item['junior_and_high'] ['total_function_room'];
            $item['total_subject_room'] = $item['junior_and_high'] ['total_subject_room'];
            $item['total_device_full'] = $item['junior_and_high'] ['total_device_full'];
            $item['total_device_not_full'] = $item['junior_and_high'] ['total_device_not_full'];

            $item = $item->toArray();
            $data[] = $item;
        }
        $this->downloadExcel('THCS-THPT data'.date('Y-m-d'), $exportFields, $data, 'THCS-THPT-'.date('Y-m-d').'.xlsx');
    }


    public function delete($id) {
        School::FindOrFail($id)->delete();
    return redirect()->back();
}
}
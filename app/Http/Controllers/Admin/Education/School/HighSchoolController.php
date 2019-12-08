<?php

namespace App\Http\Controllers\Admin\Education\School;

use App\Models\Commune;
use App\Models\District;
use App\Http\Controllers\Controller;
use App\Models\HighSchool;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HighSchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('check-admin-writer-permission');
    }

    public function index() {
        $schools = School::where('type_school', '=', 4)->with('commune','district', 'high')->get();
        $districts = District::pluck('name', 'id');
        return view('admin.education.school.high.list')->with(compact('schools', 'districts'));
    }

    public function filter(Request $request) {
        $districts = District::pluck('name', 'id');
        $schools = School::where('type_school', '=', 4)->with('commune','district','primary');
        $filter = [];
        if ($request->district_id) {
            $filter['district_id'] = $request->district_id;
        }
        if ($request->commune_id) {
            $filter['commune_id'] = $request->commune_id;
        }
        $schools = $schools->where($filter)->get();
        return view('admin.education.school.high.list')->with(compact('schools', 'districts'));
    }

    public function getForm() {
        $districts = District::pluck('name', 'id');
        return view('admin.education.school.high.form')->with(compact('districts'));
    }

    public function saveForm(Request $request) {
        $rules = [
            'code' => 'required',
            'name' => 'required|max:100',
            'district_id' => 'required',
            'commune_id' => 'required',
            'address' => 'required',
            'phone' => 'numeric|min:10|min:20',
            'email' => 'email|max:100',
            'name_of_principal' => 'required|max:30',
            'total_of_class' => 'numeric',
            'total_of_grade_10' => 'numeric',
            'total_of_grade_11' => 'numeric',
            'total_of_grade_12' => 'numeric',
            'total_of_student' => 'numeric',
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
            'code.required' => 'mã trường không được để trống',
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
            'total_of_grade_10.numeric' => 'Trường này phải nhập số',
            'total_of_grade_11.numeric' => 'Trường này phải nhập số',
            'total_of_grade_12.numeric' => 'Trường này phải nhập số',
            'total_of_student.numeric' => 'Trường này phải nhập số',
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
            $request['type_school'] = 4;
            $school = School::create($request->all());
            $request['school_id'] = $school->id;
            HighSchool::create($request->all());
            return redirect()->route('admin.school.high.list');
        }
    }

    public function editForm($id) {
        $districts = District::pluck('name', 'id');
        $school = School::FindOrFail($id);
        $communes = Commune::where('district_id', '=', $school->district_id)->pluck('name', 'id');
        $data = HighSchool::where('school_id', '=', $id)->first();
        return view('admin.education.school.high.edit', compact('school', 'districts', 'communes', 'data'));
    }

    public function updateForm(Request $request, $id) {
        $rules = [
            'code' => 'required',
            'name' => 'required|max:100',
            'district_id' => 'required',
            'commune_id' => 'required',
            'address' => 'required',
            'phone' => 'numeric|min:10|min:20',
            'email' => 'email|max:100',
            'name_of_principal' => 'required|max:30',
            'total_of_class' => 'numeric',
            'total_of_grade_10' => 'numeric',
            'total_of_grade_11' => 'numeric',
            'total_of_grade_12' => 'numeric',
            'total_of_student' => 'numeric',
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
            'code.required' => 'mã trường không được để trống',
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
            'total_of_grade_10.numeric' => 'Trường này phải nhập số',
            'total_of_grade_11.numeric' => 'Trường này phải nhập số',
            'total_of_grade_12.numeric' => 'Trường này phải nhập số',
            'total_of_student.numeric' => 'Trường này phải nhập số',
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
                'code' => $request->code,
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
            unset($update['code']);
            unset($update['name']);
            unset($update['district_id']);
            unset($update['commune_id']);
            unset($update['address']);
            unset($update['phone']);
            unset($update['email']);
            unset($update['website']);
            unset($update['acreage']);
            unset($update['name_of_principal']);
            HighSchool::where('school_id', '=', $id)->update($update);
            return redirect()->route('admin.school.high.list');
        }
    }

    public function exportData() {
//        field => title
        $exportFields = [
            'code' => __('Mã trường'),
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
            'total_of_grade_10' => __('Tổng số lớp 10'),
            'total_of_grade_11' => __('Tổng số lớp 11'),
            'total_of_grade_12' => __('Tổng số lớp 12'),
            'total_of_student' => __('Tổng số học sinh'),
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
        $schools = School::where('type_school', '=', 4)->with('district', 'commune', 'high')->orderBy('created_at', 'desc')->get();

        $data = [];
        foreach ($schools as $item) {
            $item['district_id'] = $item['district'] ['name'];
            $item['commune_id'] = $item['commune'] ['name'];
            $item['total_of_class'] = $item['high'] ['total_of_class'];
            $item['total_of_grade_10'] = $item['high'] ['total_of_grade_10'];
            $item['total_of_grade_11'] = $item['high'] ['total_of_grade_11'];
            $item['total_of_grade_12'] = $item['high'] ['total_of_grade_12'];
            $item['total_of_student'] = $item['high'] ['total_of_student'];
            $item['total_of_student_10'] = $item['high'] ['total_of_student_10'];
            $item['total_of_student_11'] = $item['high'] ['total_of_student_11'];
            $item['total_of_student_12'] = $item['high'] ['total_of_student_12'];
            $item['total_of_all_employees'] = $item['high'] ['total_of_all_employees'];
            $item['total_of_manager'] = $item['high'] ['total_of_manager'];
            $item['total_of_teacher'] = $item['high'] ['total_of_teacher'];
            $item['total_of_employees'] = $item['high'] ['total_of_employees'];
            $item['total_classroom'] = $item['high'] ['total_classroom'];
            $item['total_function_room'] = $item['high'] ['total_function_room'];
            $item['total_subject_room'] = $item['high'] ['total_subject_room'];
            $item['total_device_full'] = $item['high'] ['total_device_full'];
            $item['total_device_not_full'] = $item['high'] ['total_device_not_full'];

            $item = $item->toArray();
            $data[] = $item;
        }
        $this->downloadExcel('THPT data'.date('Y-m-d'), $exportFields, $data, 'THPT-'.date('Y-m-d').'.xlsx');
    }

    public function delete($id) {
        School::FindOrFail($id)->delete();
        return redirect()->back();
    }
}

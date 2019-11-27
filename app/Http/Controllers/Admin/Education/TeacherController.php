<?php

namespace App\Http\Controllers\Admin\Education;

use App\Models\Commune;
use App\Models\ContinuingEducationCenter;
use App\Models\District;
use App\Models\Doctor;
use App\Models\HighSchool;
use App\Models\Hospital;
use App\Models\JuniorAndHighSchool;
use App\Models\JuniorHighSchool;
use App\Models\NurserySchool;
use App\Models\PrimaryJuniorHighSchool;
use App\Models\PrimarySchool;
use App\Models\School;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('check-admin-writer-permission');
    }

    public function index() {
        $teachers = Teacher::with('school', 'commune', 'district')->get();
        return view('admin.education.teacher.list')->with(compact('teachers'));
    }

    public function getForm() {
        $schools = School::pluck('name', 'id');
        $districts = District::pluck('name', 'id');
        return view('admin.education.teacher.form')->with(compact('schools','districts'));
    }

    public function saveForm(Request $request) {
        $rules = [
            'name' => 'required|max:255',
            'district_id' => 'required',
            'commune_id' => 'required',
            'school_id' => 'required',
            'birthday' => 'required|max:20',
            'address' => 'required|max:100',
            'phone' => 'numeric|min:10|min:20',
            'email' => 'email|max:100',
            'type_teacher' => 'required',
            'type_school' => 'required',
            'level' => 'required',
        ];

        $messages = [
            'name.required' => 'Tên trẻ không được để trống',
            'name.max' => 'Tên trẻ không được quá 255 ký tự',
            'district_id.required' => 'quận/huyện không được để trống',
            'commune_id.required' => 'phường/xã không được để trống',
            'school_id.required' => 'trường học không được để trống',
            'address.required' => 'địa chỉ không được để trống',
            'address.max' => 'địa chỉ không được nhập quá 100 ký tự',
            'birthday.required' => 'Ngày sinh không được để trống',
            'birthday.max' => 'Ngày sinh không được nhập quá 20 ký tự',
            'phone.numeric' => 'Số điện thoại phải nhập số',
            'phone.max' => 'Số điện thoại nhập tối đa 20 ký tự',
            'phone.min' => 'Số điện thoại nhập tối thiểu 10 ký tự',
            'email.email' => 'email phải là dạng email',
            'email.max' => 'email nhập tối đa 100 ký tự',
            'type_teacher.required' => 'Phân loại nhân viên giáo dục không được trống',
            'type_school.required' => 'Phân loại trường học không được trống',
            'level.required' => 'Trình độ không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            Teacher::create($request->all());
            return redirect()->route('admin.teacher.list');
        }
    }

    public function editForm($id) {
        $teacher = Teacher::FindOrFail($id);
        $districts = District::pluck('name', 'id');
        $communes = Commune::where('district_id', '=', $teacher->district_id)->pluck('name', 'id');
        $schools = School::where('type_school', '=', $teacher->type_school)->pluck('name', 'id');
        return view('admin.education.teacher.edit', compact('teacher', 'schools', 'districts', 'communes'));
    }

    public function updateForm(Request $request, $id) {
        $rules = [
            'name' => 'required|max:255',
            'district_id' => 'required',
            'commune_id' => 'required',
            'school_id' => 'required',
            'birthday' => 'required|max:20',
            'address' => 'required|max:100',
            'phone' => 'numeric|min:10|min:20',
            'email' => 'email|max:100',
            'type_teacher' => 'required',
            'level' => 'required',
        ];

        $messages = [
            'name.required' => 'Tên trẻ không được để trống',
            'name.max' => 'Tên trẻ không được quá 255 ký tự',
            'district_id.required' => 'quận/huyện không được để trống',
            'commune_id.required' => 'phường/xã không được để trống',
            'school_id.required' => 'trường học không được để trống',
            'address.required' => 'địa chỉ không được để trống',
            'address.max' => 'địa chỉ không được nhập quá 100 ký tự',
            'birthday.required' => 'Ngày sinh không được để trống',
            'birthday.max' => 'Ngày sinh không được nhập quá 20 ký tự',
            'phone.numeric' => 'Số điện thoại phải nhập số',
            'phone.max' => 'Số điện thoại nhập tối đa 20 ký tự',
            'phone.min' => 'Số điện thoại nhập tối thiểu 10 ký tự',
            'email.email' => 'email phải là dạng email',
            'email.max' => 'email nhập tối đa 100 ký tự',
            'type_teacher.required' => 'Phân loại nhân viên giáo dục không được trống',
            'level.required' => 'Trình độ không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $updateRequest = $request->all();
            unset($updateRequest['_token']);
            Teacher::where('id', '=', $id)->update($updateRequest);
            return redirect()->route('admin.teacher.list');
        }
    }

    public function delete($id) {
        Teacher::FindOrFail($id)->delete();
        return redirect()->back();
    }
}

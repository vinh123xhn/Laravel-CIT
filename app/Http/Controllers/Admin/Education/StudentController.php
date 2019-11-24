<?php

namespace App\Http\Controllers\Admin\Education;

use App\Models\Children;
use App\Models\Commune;
use App\Models\District;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('check-admin-writer-permission');
    }

    public function index() {
        $students = Student::with('school', 'district', 'commune')->get();
        return view('admin.education.student.list')->with(compact('students'));
    }

    public function getForm() {
        $schools = School::pluck('name', 'id');
        $districts = District::pluck('name', 'id');
        return view('admin.education.student.form', compact('districts', 'schools'));
    }

    public function saveForm(Request $request) {
        $rules = [
            'name' => 'required|max:255',
            'district_id' => 'required',
            'commune_id' => 'required',
            'school_id' => 'required',
            'birthday' => 'required|max:20',
            'address' => 'required|max:100',
            'name_of_dad' => 'required|max:50',
            'name_of_mom' => 'required|max:50',
            'type_of_student' => 'required',
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
            'type_of_student.required' => 'Phân loại học sinh không được trống',
            'level.required' => 'Lớp không được để trống',
            'name_of_dad.required' => 'tên ch không được để trống',
            'name_of_dad.max' => 'tên cha không được nhập quá 50 ký tự',
            'name_of_mom.required' => 'tên mẹ không được để trống',
            'name_of_mom.max' => 'tên mẹ không được nhập quá 50 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            Student::create($request->all());
            return redirect()->route('admin.student.list');
        }
    }

    public function editForm($id) {
        $schools = School::pluck('name', 'id');
        $districts = District::pluck('name', 'id');
        $student = Student::FindOrFail($id);
        $communes = Commune::where('district_id', '=', $student->district_id)->pluck('name', 'id');
        return view('admin.education.student.edit')->with(compact('student', 'schools', 'districts', 'communes'));
    }

    public function updateForm(Request $request, $id) {
        $rules = [
            'name' => 'required|max:255',
            'district_id' => 'required',
            'commune_id' => 'required',
            'school_id' => 'required',
            'birthday' => 'required|max:20',
            'address' => 'required|max:100',
            'name_of_dad' => 'required|max:50',
            'name_of_mom' => 'required|max:50',
            'type_of_student' => 'required',
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
            'type_of_student.required' => 'Phân loại học sinh không được trống',
            'level.required' => 'Lớp không được để trống',
            'name_of_dad.required' => 'tên ch không được để trống',
            'name_of_dad.max' => 'tên cha không được nhập quá 50 ký tự',
            'name_of_mom.required' => 'tên mẹ không được để trống',
            'name_of_mom.max' => 'tên mẹ không được nhập quá 50 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $updateRequest = $request->all();
            unset($updateRequest['_token']);
            Student::where('id', '=', $id)->update($updateRequest);
            return redirect()->route('admin.student.list');
        }
    }

    public function detail() {

    }

    public function delete($id) {
        Student::FindOrFail($id)->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin\Education;

use App\Models\Children;
use App\Models\Commune;
use App\Models\ContinuingEducationCenter;
use App\Models\District;
use App\Models\HighSchool;
use App\Models\JuniorAndHighSchool;
use App\Models\JuniorHighSchool;
use App\Models\NurserySchool;
use App\Models\PrimaryJuniorHighSchool;
use App\Models\PrimarySchool;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('check-admin-writer-permission');
    }

    public function index() {
        $students = Student::with('district', 'commune', 'school')->get();
        $districts = District::pluck('name', 'id');
        return view('admin.education.student.list')->with(compact('students', 'districts'));
    }

    public function filter(Request $request) {
        $districts = District::pluck('name', 'id');
        $students = Student::with('commune','district', 'school');
        $filter = [];
        if ($request->district_id) {
            $filter['district_id'] = $request->district_id;
        }
        if ($request->commune_id) {
            $filter['commune_id'] = $request->commune_id;
        }
        $students = $students->where($filter)->get();
        return view('admin.education.student.list')->with(compact('students', 'districts'));
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
            'type_school' => 'required',
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
            'type_school.required' => 'Cấp trường học không được để trống',
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
            $data = $request->all();
            unset($data['avatar']);
            if($request->hasFile('avatar'))
            {
                $image_path = $request->file('avatar')->store('students', 'public');
                $data['avatar'] = $image_path;
            }
            Student::create($data);
            return redirect()->route('admin.student.list');
        }
    }

    public function editForm($id) {
        $districts = District::pluck('name', 'id');
        $student = Student::FindOrFail($id);
        $communes = Commune::where('district_id', '=', $student->district_id)->pluck('name', 'id');
        $schools = School::where('type_school', '=', $student->type_school)->pluck('name', 'id');
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
            $student = Student::FindOrFail($id);
            $updateRequest = $request->all();
            unset($updateRequest['_token']);
            unset($updateRequest['avatar']);
            if ($request->hasFile('avatar')) {
                //xoa anh cu neu co
                $currentImg = $student->avatar;
                if ($currentImg) {
                    Storage::delete('public/' . $currentImg);
                }
                //cap nhap anh moi
                $image = $request->file('avatar');
                $pathImage = $image->store('students', 'public');
                $updateRequest['avatar'] = $pathImage;

            }
            Student::where('id', '=', $id)->update($updateRequest);
            return redirect()->route('admin.student.list');
        }
    }

    public function exportData() {
//        field => title
        $exportFields = [
            'name' => __('Họ và tên'),
            'gender' => __('Giới tính'),
            'birthday' => __('Ngày sinh'),
            'name_of_dad' => __('Họ và tên bố'),
            'name_of_mom' => __('Họ và tên mẹ'),
            'phone' => __('Số điện thoại'),
            'address' => __('địa chỉ'),
            'district_id' => __('Quận/ huyện'),
            'commune_id' => __('Phường/ xã'),
            'school_id' => __('Đang học tại trường'),
            'type_school' => __('Cấp'),
            'level' => __('Lớp'),
            'type_of_student' => __('Học lực'),
        ];
        $students = Student::with('district', 'commune', 'school')->orderBy('created_at', 'desc')->get();
        $gender = config('base.gender');
        $type_school = config('base.type_of_school');
        $level = config('base.level_of_student');
        $type_of_student = config('base.type_of_student');

        $data = [];
        foreach ($students as $item) {
            $item['gender'] = $item->gender ? $gender[$item->gender] : '';
            $item['district_id'] = $item['district'] ['name'];
            $item['commune_id'] = $item['commune'] ['name'];
            $item['school_id'] = $item['school']['name'];
            $item['type_school'] = $item->type_school ? $type_school[$item->type_school] : '';
            $item['level'] = $item->level ? $level[$item->level] : '';
            $item['type_of_student'] = $item->type_of_student ? $type_of_student[$item->type_of_student] : '';

            $item = $item->toArray();
            $data[] = $item;
        }
        $this->downloadExcel('Học sinh data'.date('Y-m-d'), $exportFields, $data, 'Học sinh-'.date('Y-m-d').'.xlsx');
    }

    public function delete($id) {
        Student::FindOrFail($id)->delete();
        return redirect()->back();
    }
}

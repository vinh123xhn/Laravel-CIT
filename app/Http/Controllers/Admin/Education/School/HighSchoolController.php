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

        return view('admin.education.school.high.list')->with(compact('schools'));
    }

    public function getForm() {
        $districts = District::pluck('name', 'id');
        return view('admin.education.school.high.form')->with(compact('districts'));
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
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $request['type_school'] = 4;
            $school = School::create($request->all());
            HighSchool::create([
                'school_id' => $school->id,
                'type_school' => 4,
                'total_of_class' => $request->total_of_class,
                'total_of_10' => $request->total_of_10,
                'total_of_11' => $request->total_of_11,
                'total_of_12' => $request->total_of_12,
                'total_classroom' => $request->total_classroom,
                'total_function_room' => $request->total_function_room,
                'total_subject_room' => $request->total_subject_room,
                'total_device_full' => $request->total_device_full,
                'total_device_not_full' => $request->total_device_not_full,
            ]);
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
            'name' => 'required|max:100',
            'district_id' => 'required',
            'commune_id' => 'required',
            'address' => 'required',
            'phone' => 'numeric|min:10|min:20',
            'email' => 'email|max:100',
            'name_of_principal' => 'required|max:30',
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
            HighSchool::where('school_id', '=', $id)->update([
                'total_of_class' => $request->total_of_class,
                'total_of_10' => $request->total_of_10,
                'total_of_11' => $request->total_of_11,
                'total_of_12' => $request->total_of_12,
                'total_classroom' => $request->total_classroom,
                'total_function_room' => $request->total_function_room,
                'total_subject_room' => $request->total_subject_room,
                'total_device_full' => $request->total_device_full,
                'total_device_not_full' => $request->total_device_not_full,
            ]);
            return redirect()->route('admin.school.high.list');
        }
    }

    public function detail() {

    }

    public function delete($id) {
        School::FindOrFail($id)->delete();
        return redirect()->back();
    }
}

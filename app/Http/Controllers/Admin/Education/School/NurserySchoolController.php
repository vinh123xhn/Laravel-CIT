<?php

namespace App\Http\Controllers\Admin\Education\School;

use App\Models\Commune;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\NurserySchool;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NurserySchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('check-admin-writer-permission');
    }

    public function index() {
        $schools = School::where('type_school', '=', 1)->with('commune','district','nursery')->get();

        return view('admin.education.school.nursery.list')->with(compact('schools'));
    }

    public function getForm() {
        $districts = District::pluck('name', 'id');
        return view('admin.education.school.nursery.form')->with(compact('districts'));
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
            $request['type_school'] = 1;
            $school = School::create($request->all());
            NurserySchool::create([
                'school_id' => $school->id,
                'type_school' => 1,
                'total_of_nursery_class' => $request->total_of_nursery_class,
                'total_of_nursery_3_12' => $request->total_of_nursery_3_12,
                'total_of_nursery_13_24' => $request->total_of_nursery_13_24,
                'total_of_nursery_25_36' => $request->total_of_nursery_25_36,
                'total_of_nursery_collect' => $request->total_of_nursery_collect,
                'total_of_kindergarten_class' => $request->total_of_kindergarten_class,
                'total_of_kindergarten_3_4' => $request->total_of_kindergarten_3_4,
                'total_of_kindergarten_4_5' => $request->total_of_kindergarten_4_5,
                'total_of_kindergarten_5_6' => $request->total_of_kindergarten_5_6,
                'total_of_kindergarten_collect' => $request->total_of_kindergarten_collect,
                'total_classroom_nursery' => $request->total_classroom_nursery,
                'total_classroom_kindergarten' => $request->total_classroom_kindergarten,
                'total_function_room' => $request->total_function_room,
            ]);
            return redirect()->route('admin.school.nursery.list');
        }
    }

    public function editForm($id) {
        $districts = District::pluck('name', 'id');
        $school = School::FindOrFail($id);
        $communes = Commune::where('district_id', '=', $school->district_id)->pluck('name', 'id');
        $data = NurserySchool::where('school_id', '=', $id)->first();
        return view('admin.education.school.nursery.edit', compact('school', 'districts', 'communes', 'data'));
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
            NurserySchool::where('school_id', '=', $id)->update([
                'total_of_nursery_class' => $request->total_of_nursery_class,
                'total_of_nursery_3_12' => $request->total_of_nursery_3_12,
                'total_of_nursery_13_24' => $request->total_of_nursery_13_24,
                'total_of_nursery_25_36' => $request->total_of_nursery_25_36,
                'total_of_nursery_collect' => $request->total_of_nursery_collect,
                'total_of_kindergarten_class' => $request->total_of_kindergarten_class,
                'total_of_kindergarten_3_4' => $request->total_of_kindergarten_3_4,
                'total_of_kindergarten_4_5' => $request->total_of_kindergarten_4_5,
                'total_of_kindergarten_5_6' => $request->total_of_kindergarten_5_6,
                'total_of_kindergarten_collect' => $request->total_of_kindergarten_collect,
                'total_classroom_nursery' => $request->total_classroom_nursery,
                'total_classroom_kindergarten' => $request->total_classroom_kindergarten,
                'total_function_room' => $request->total_function_room,]);
            return redirect()->route('admin.school.nursery.list');
        }
    }

    public function detail() {

    }

    public function delete($id) {
        School::FindOrFail($id)->delete();
        return redirect()->back();
    }
}

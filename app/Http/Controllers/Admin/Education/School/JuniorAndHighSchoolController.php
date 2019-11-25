<?php

namespace App\Http\Controllers\Admin\Education\School;

use App\Models\Commune;
use App\Models\District;
use App\Http\Controllers\Controller;
use App\Models\JuniorAndHighSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JuniorAndHighSchoolController extends Controller
{
    public function __construct()
{
    $this->middleware('check-admin-writer-permission');
}

    public function index() {
    $schools = JuniorAndHighSchool::get();

    return view('admin.education.school.junior_and_high.list')->with(compact('schools'));
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
        'type_of_school' => 'required',
        'address' => 'required',
        'phone' => 'numeric|min:10|min:20',
        'email' => 'email|max:100',
        'name_of_principal' => 'required|max:30',
    ];

    $messages = [
        'name.required' => 'tên trường không được để trống',
        'name.max' => 'tên trường không được quá 255 ký tự',
        'type_of_school.required' => 'phân loại trường không được để trống',
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
        JuniorAndHighSchool::create($request->all());
        return redirect()->route('admin.school.junior_and_high.list');
    }
}

    public function editForm($id) {
    $districts = District::pluck('name', 'id');
    $school = JuniorAndHighSchool::FindOrFail($id);
    $communes = Commune::where('district_id', '=', $school->district_id)->pluck('name', 'id');
    return view('admin.education.school.junior_and_high.edit', compact('school', 'districts', 'communes'));
}

    public function updateForm(Request $request, $id) {
    $rules = [
        'name' => 'required|max:100',
        'district_id' => 'required',
        'commune_id' => 'required',
        'type_of_school' => 'required',
        'address' => 'required',
        'phone' => 'numeric|min:10|min:20',
        'email' => 'email|max:100',
        'name_of_principal' => 'required|max:30',
    ];

    $messages = [
        'name.required' => 'tên trường không được để trống',
        'name.max' => 'tên trường không được quá 255 ký tự',
        'type_of_school.required' => 'phân loại trường không được để trống',
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
        $updateRequest = $request->all();
        unset($updateRequest['_token']);
        JuniorAndHighSchool::where('id', '=', $id)->update($updateRequest);
        return redirect()->route('admin.school.junior_and_high.list');
    }
}

    public function detail() {

}

    public function delete($id) {
        JuniorAndHighSchool::FindOrFail($id)->delete();
    return redirect()->back();
}
}

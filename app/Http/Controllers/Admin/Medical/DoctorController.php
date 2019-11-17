<?php

namespace App\Http\Controllers\Admin\Medical;

use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function index() {
        $doctors = Doctor::with('Hospital')->get();
        return view('admin.medical.doctor.list')->with(compact('doctors'));
    }

    public function getForm() {
        $hospitals = Hospital::pluck('name', 'id');
        return view('admin.medical.doctor.form')->with(compact('hospitals'));
    }

    public function saveForm(Request $request) {
        $rules = [
            'name' => 'required|max:255',
            'hospital_id' => 'required',
            'type' => 'required',
            'birthday' => 'required',
            'phone' => 'numeric',
        ];

        $messages = [
            'name.required' => 'tên nhân viên y tế không được để trống',
            'name.max' => 'tên nhân viên y tế không được quá 255 ký tự',
            'type.required' => 'phân loại nhân viên y tế không được để trống',
            'hospital_id.required' => 'thuộc cơ sở y tế không được để trống',
            'birthday.required' => 'ngày sinh không được để trống',
            'phone.numeric' => 'Số điện thoại phải nhập số',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            Doctor::create($request->all());
            return redirect()->route('admin.doctor.list');
        }
    }

    public function editForm($id) {
        $doctor = Doctor::FindOrFail($id);
        $hospitals = Hospital::pluck('name', 'id');

        return view('admin.medical.doctor.edit', compact('doctor', 'hospitals'));
    }

    public function updateForm(Request $request, $id) {
        $rules = [
            'name' => 'required|max:255',
            'hospital_id' => 'required',
            'type' => 'required',
            'birthday' => 'required',
            'phone' => 'numeric',
        ];

        $messages = [
            'name.required' => 'tên nhân viên y tế không được để trống',
            'name.max' => 'tên nhân viên y tế không được quá 255 ký tự',
            'type.required' => 'phân loại nhân viên y tế không được để trống',
            'hospital_id.required' => 'thuộc cơ sở y tế không được để trống',
            'birthday.required' => 'ngày sinh không được để trống',
            'phone.numeric' => 'Số điện thoại phải nhập số',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $updateRequest = $request->all();
            unset($updateRequest['_token']);
            Doctor::where('id', '=', $id)->update($updateRequest);
            return redirect()->route('admin.doctor.list');
        }
    }

    public function getDetail() {

    }
}

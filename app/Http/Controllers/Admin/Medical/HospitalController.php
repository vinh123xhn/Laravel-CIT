<?php

namespace App\Http\Controllers\Admin\Medical;

use App\Models\Hospital;
use App\Models\TypeHospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HospitalController extends Controller
{
    public function index() {
        $hospitals = Hospital::with('type')->get();
        return view('admin.medical.hospital.list')->with(compact('hospitals'));
    }

    public function getForm() {
        $types = TypeHospital::pluck('name', 'id');
        return view('admin.medical.hospital.form')->with(compact('types'));
    }

    public function saveForm(Request $request) {
        $rules = [
            'name' => 'required|max:255|unique:hospitals,name',
            'type' => 'required',
            'phone' => 'numeric',
        ];

        $messages = [
            'name.required' => 'tên cơ sở y tế không được để trống',
            'name.unique' => 'tên cơ sở y tế không được trùng',
            'name.max' => 'tên cơ sở y tế không được quá 255 ký tự',
            'type.required' => 'dạng cơ sở y tế không được để trống',
            'phone.numeric' => 'Số điện thoại phải nhập số',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            Hospital::create($request->all());
            return redirect()->route('admin.hospital.list');
        }
    }

    public function editForm($id) {
        $hospital = Hospital::FindOrFail($id);
        $types = TypeHospital::pluck('name', 'id');
        return view('admin.medical.hospital.edit', compact('types'), compact('hospital'));
    }

    public function updateForm(Request $request, $id) {
        $rules = [
            'name' => 'required|max:255|unique:hospitals,name'.$id,
            'type' => 'required',
            'phone' => 'numeric',
        ];

        $messages = [
            'name.required' => 'tên cơ sở y tế không được để trống',
            'name.unique' => 'tên cơ sở y tế không được trùng',
            'name.max' => 'tên cơ sở y tế không được quá 255 ký tự',
            'type.required' => 'dạng cơ sở y tế không được để trống',
            'phone.numeric' => 'Số điện thoại phải nhập số',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $updateRequest = $request->all();
            unset($updateRequest['_token']);
            Hospital::where('id', '=', $id)->update($updateRequest);
            return redirect()->route('admin.hospital.list');
        }
    }

    public function getDetail() {

    }
}

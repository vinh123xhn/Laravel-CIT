<?php

namespace App\Http\Controllers\Admin\Medical;

use App\Models\TypeHospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TypeOfHospitalController extends Controller
{
    public function index() {
        $types = TypeHospital::get();
        return view('admin.medical.type-hospital.list')->with(compact('types'));
    }

    public function getForm() {
        return view('admin.medical.type-hospital.form');
    }

    public function saveForm(Request $request) {
        $rules = [
            'name' => 'required|unique:type_hospital,name|max:255',
            'type' => 'required',
        ];

        $messages = [
            'name.required' => 'tên phân loại không được để trống',
            'name.unique' => 'tên phân loại không được trùng',
            'name.max' => 'tên phân loại không được quá 255 ký tự',
            'type.required' => 'dạng phân loại không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            TypeHospital::create($request->all());
            return redirect()->route('admin.type-hospital.list');
        }
    }

    public function editForm($id) {
        $type = TypeHospital::FindOrFail($id);
        return view('admin.medical.type-hospital.edit')->with(compact('type'));
    }

    public function updateForm(Request $request, $id) {
        $rules = [
            'name' => 'required|max:255|unique:type_hospital,name,'.$id,
            'type' => 'required',
        ];

        $messages = [
            'name.required' => 'tên phân loại không được để trống',
            'name.unique' => 'tên phân loại không được trùng',
            'name.max' => 'tên phân loại không được quá 255 ký tự',
            'type.required' => 'dạng phân loại không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $updateRequest = $request->all();
            unset($updateRequest['_token']);
            TypeHospital::where('id', '=', $id)->update($updateRequest);
            return redirect()->route('admin.type-hospital.list');
        }
    }

    public function getDetail() {

    }
}

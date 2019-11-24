<?php

namespace App\Http\Controllers\Admin\Area;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistrictController extends Controller
{
    public function index() {
        $districts = District::all();
        return view('admin.area.district.list')->with(compact('districts'));
    }

    public function getForm() {
        return view('admin.area.district.form');
    }

    public function saveForm(Request $request) {
        $rules = [
            'name' => 'required|max:100',
        ];

        $messages = [
            'name.required' => 'tên trường không được để trống',
            'name.max' => 'tên trường không được quá 255 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            District::create($request->all());
            return redirect()->route('admin.district.list');
        }
    }

    public function editForm($id) {
        $district = District::FindOrFail($id);
        return view('admin.area.district.edit', compact('district'));
    }

    public function updateForm(Request $request, $id) {
        $rules = [
            'name' => 'required|max:100',
        ];

        $messages = [
            'name.required' => 'tên trường không được để trống',
            'name.max' => 'tên trường không được quá 255 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $updateRequest = $request->all();
            unset($updateRequest['_token']);
            District::where('id', '=', $id)->update($updateRequest);
            return redirect()->route('admin.district.list');
        }
    }

    public function delete($id) {
        District::FindOrFail($id)->delete();
        $districts = District::all();
        return redirect()->back()->with(compact('districts'));
    }
}

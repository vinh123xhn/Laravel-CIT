<?php

namespace App\Http\Controllers\Admin\Medical;

use App\Models\Children;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ChildrenController extends Controller
{
    public function index() {
        $childrens = Children::get();
        return view('admin.medical.children.list')->with(compact('childrens'));
    }

    public function getForm() {
        return view('admin.medical.children.form');
    }

    public function saveForm(Request $request) {
        $rules = [
            'name' => 'required|max:255',
            'birthday' => 'required',
            'address' => 'required',
            'type' => 'required',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'comment' => 'required',
        ];

        $messages = [
            'name.required' => 'Tên trẻ không được để trống',
            'name.max' => 'Tên trẻ không được quá 255 ký tự',
            'birthday.required' => 'Ngày sinh không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'type.required' => 'Phân loại không được trống',
            'weight.required' => 'Cân nặng không được để trống',
            'weight.numeric' => 'Cân nặng chỉ nhập bằng số',
            'height.required' => 'Chiều cao không được để trống',
            'height.numeric' => 'Chiều cao chỉ nhập bằng số',
            'comment.required' => 'Nhận xét không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            Children::create($request->all());
            return redirect()->route('admin.children.list');
        }
    }

    public function editForm($id) {
        $children = Children::FindOrFail($id);
        return view('admin.medical.children.edit')->with(compact('children'));
    }

    public function updateForm(Request $request, $id) {
        $rules = [
            'name' => 'required|max:255',
            'birthday' => 'required',
            'address' => 'required',
            'type' => 'required',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'comment' => 'required',
        ];

        $messages = [
            'name.required' => 'Tên trẻ không được để trống',
            'name.max' => 'Tên trẻ không được quá 255 ký tự',
            'birthday.required' => 'Ngày sinh không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'type.required' => 'Phân loại không được trống',
            'weight.required' => 'Cân nặng không được để trống',
            'weight.numeric' => 'Cân nặng chỉ nhập bằng số',
            'height.required' => 'Chiều cao không được để trống',
            'height.numeric' => 'Chiều cao chỉ nhập bằng số',
            'comment.required' => 'Nhận xét không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $updateRequest = $request->all();
            unset($updateRequest['_token']);
            Children::where('id', '=', $id)->update($updateRequest);
            return redirect()->route('admin.children.list');
        }
    }

    public function getDetail() {

    }
}

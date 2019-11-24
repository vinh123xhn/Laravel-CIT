<?php

namespace App\Http\Controllers\Admin\Area;

use App\Models\Commune;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommuneController extends Controller
{
    public function index($district_id) {
        $communes = Commune::where('district_id', '=', $district_id)->get();
        return view('admin.area.commune.list', compact('communes', 'district_id'));
    }

    public function getForm($district_id) {
        return view('admin.area.commune.form', compact('district_id'));
    }

    public function saveForm(Request $request, $district_id) {
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
            $request['district_id'] = $district_id;
            Commune::create($request->all());
            return redirect()->route('admin.commune.list', compact('district_id'));
        }
    }

    public function editForm($district_id, $id) {
        $commune = Commune::FindOrFail($id);
        return view('admin.area.commune.edit', compact('commune', 'district_id'));
    }

    public function updateForm(Request $request, $district_id, $id) {
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
            $request['district_id'] = $district_id;
            $updateRequest = $request->all();
            unset($updateRequest['_token']);
            Commune::where('id', '=', $id)->update($updateRequest);
            return redirect()->route('admin.commune.list', compact('district_id'));
        }
    }

    public function delete($district_id, $id) {
        Commune::FindOrFail($id)->delete();
        $communes = Commune::where('district_id', '=', $district_id)->get();
        return redirect()->back()->with(compact('district_id', 'communes'));
    }
}

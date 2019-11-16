<?php

namespace App\Http\Controllers\Admin\Medical;

use App\Models\TypeHospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        TypeHospital::create($request->all());
        return redirect()->route('admin.type-hospital.list');
    }

    public function getDetail() {

    }
}

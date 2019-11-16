<?php

namespace App\Http\Controllers\Admin\Medical;

use App\Models\Hospital;
use App\Models\TypeHospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        Hospital::create($request->all());
        return redirect()->route('admin.hospital.list');
    }

    public function getDetail() {

    }
}

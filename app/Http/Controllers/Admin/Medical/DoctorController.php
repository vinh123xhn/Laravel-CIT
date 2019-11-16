<?php

namespace App\Http\Controllers\Admin\Medical;

use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        Doctor::create($request->all());
        return redirect()->route('admin.doctor.list');
    }

    public function getDetail() {

    }
}

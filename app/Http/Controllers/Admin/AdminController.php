<?php

namespace App\Http\Controllers\Admin;

use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function index(Request $request) {
//        $districts = \App\Models\District::orderBy('id')->withCount('student_nursery', 'student_primary', 'student_junior_high', 'student_high', 'student_primary_junior_high', 'student_junior_and_high', 'student_cec')->get();
//        dd($districts);
        return view('admin.dashboard');
    }
}

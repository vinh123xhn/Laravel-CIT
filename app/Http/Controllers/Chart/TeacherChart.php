<?php

namespace App\Http\Controllers\Chart;

use App\Models\Teacher;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TeacherChart extends Controller
{
    function chartTeacher1 () {
        $data = [];
        $districts = \App\Models\District::orderBy('id')->withCount('teacher', 'manager', 'employee')->get();
        foreach ($districts as $k => $item) {
            $data['district'][$k] = $item->name;
            $data['teacher'][$k] = $item['teacher_count'];
            $data['manager'][$k] = $item['manager_count'];
            $data['employee'][$k] = $item['employee_count'];
        }
        return Response()->json($data);
    }

    function chartTeacher2 () {
        $data = [];
        $data['year'] = [];
        $data['teacher'] = [];
        $data['manager'] = [];
        $data['employee'] = [];
        $now = Carbon::now();
        $year = $now->year;
        $ago = $year - 10;
        for ($i = $ago; $i <= $year; $i++) {
            array_push($data['year'], $i);
            array_push($data['teacher'], \App\Models\Teacher::whereIn('type_teacher', [1,2,3,4,5])->where('year', '=', $i)->count());
            array_push($data['manager'], \App\Models\Teacher::where('type_teacher', '=', 6)->where('year', '=', $i)->count());
            array_push($data['employee'], \App\Models\Teacher::where('type_teacher', '=', 7)->where('year', '=', $i)->count());
        }

        return Response()->json($data);
    }

    function chartTeacher3 () {
        $data = [];
        $data['teacher'] = [];
        $data['manager'] = [];
        $data['employee'] = [];
        for ($i = 1; $i <= 2; $i++){
            $student = Teacher::where('gender', '=', $i);
            array_push($data['teacher'], $student->whereIn('type_teacher', [1,2,3,4,5])->count());
            array_push($data['manager'], $student->where('type_school', 2)->count());
            array_push($data['employee'], $student->where('type_school', 3)->count());
        }
        return Response()->json($data);
    }
}

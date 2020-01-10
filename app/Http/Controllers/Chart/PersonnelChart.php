<?php

namespace App\Http\Controllers\Chart;

use App\Models\Personnel;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class personnelChart extends Controller
{
    function chartPersonnel1 () {
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

    function chartPersonnel2 () {
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
            array_push($data['teacher'], \App\Models\Personnel::whereIn('type_teacher', [1,2,3,4,5])->where('year', '=', $i)->count());
            array_push($data['manager'], \App\Models\Personnel::where('type_teacher', '=', 6)->where('year', '=', $i)->count());
            array_push($data['employee'], \App\Models\Personnel::where('type_teacher', '=', 7)->where('year', '=', $i)->count());
        }

        return Response()->json($data);
    }

    function chartPersonnel3 () {
        $data = [];
        $data['teacher'] = [];
        $data['manager'] = [];
        $data['employee'] = [];
        for ($i = 1; $i <= 2; $i++){
            $student = Personnel::where('gender', '=', $i);
            array_push($data['teacher'], $student->whereIn('type_teacher', [1,2,3,4,5])->count());
            array_push($data['manager'], $student->where('type_teacher', 6)->count());
            array_push($data['employee'], $student->where('type_teacher', 7)->count());
        }
        return Response()->json($data);
    }
}

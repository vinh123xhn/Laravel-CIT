<?php

namespace App\Models;

use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class NurserySchool extends Model
{
    protected $table = 'nursery_schools';

    protected $fillable = [
        'id',
        'school_id',
        'type_school',
        'total_of_nursery_class',
        'total_of_nursery_3_12',
        'total_of_nursery_13_24',
        'total_of_nursery_25_36',
        'total_of_nursery_collect',
        'total_of_kindergarten_class',
        'total_of_kindergarten_3_4',
        'total_of_kindergarten_4_5',
        'total_of_kindergarten_5_6',
        'total_of_kindergarten_collect',
        'total_of_nursery_student',
        'total_of_nursery_3_12_student',
        'total_of_nursery_13_24_student',
        'total_of_nursery_25_36_student',
        'total_of_nursery_collect_student',
        'total_of_kindergarten_student',
        'total_of_kindergarten_3_4_student',
        'total_of_kindergarten_4_5_student',
        'total_of_kindergarten_5_6_student',
        'total_of_kindergarten_collect_student',
        'total_of_all_employees',
        'total_of_manager',
        'total_of_nursery_teacher',
        'total_of_kindergarten_teacher',
        'total_of_employees',
        'total_classroom_nursery',
        'total_classroom_kindergarten',
        'total_function_room',
        'total_subject_room',
        'total_device_full',
        'total_device_not_full',
    ];
}

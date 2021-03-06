<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PrimaryJuniorHighSchool extends Model
{
    protected $table = 'primary_junior_high_schools';

    protected $fillable = [
        'id',
        'school_id',
        'type_school',
        'total_of_class',
        'total_of_grade_1',
        'total_of_grade_2',
        'total_of_grade_3',
        'total_of_grade_4',
        'total_of_grade_5',
        'total_of_grade_6',
        'total_of_grade_7',
        'total_of_grade_8',
        'total_of_grade_9',
        'total_of_student',
        'total_of_student_1',
        'total_of_student_2',
        'total_of_student_3',
        'total_of_student_4',
        'total_of_student_5',
        'total_of_student_6',
        'total_of_student_7',
        'total_of_student_8',
        'total_of_student_9',
        'total_of_all_employees',
        'total_of_manager',
        'total_of_primary_teacher',
        'total_of_junior_high_teacher',
        'total_of_employees',
        'total_classroom',
        'total_function_room',
        'total_subject_room',
        'total_device_full',
        'total_device_not_full',
    ];


}

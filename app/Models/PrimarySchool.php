<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PrimarySchool extends Model
{
    protected $table = 'primary_schools';

    protected $fillable = [
        'id',
        'school_id',
        'type_school',
        'total_of_class',
        'total_of_1',
        'total_of_2',
        'total_of_3',
        'total_of_4',
        'total_of_5',
        'total_classroom',
        'total_function_room',
        'total_device_full',
        'total_device_not_full',
    ];

}

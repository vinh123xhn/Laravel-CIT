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
        'total_of_1',
        'total_of_2',
        'total_of_3',
        'total_of_4',
        'total_of_5',
        'total_of_6',
        'total_of_7',
        'total_of_8',
        'total_of_9',
        'total_classroom',
        'total_function_room',
        'total_subject_room',
        'total_device_full',
        'total_device_not_full',
    ];

//    public static function boot()
//    {
//        parent::boot();
//
//        self::created(function($model){
//            DB::table('schools')->insert([
//                [
//                    'school_id' => $model->id,
//                    'type_school' => 5
//                ]
//            ]);
//        });
//
//        self::deleted(function($model){
//            DB::table('schools')->where('school_id', '=', $model->id)->delete();
//        });
//    }
}

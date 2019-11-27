<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HighSchool extends Model
{
    protected $table = 'high_schools';

    protected $fillable = [
        'id',
        'school_id',
        'type_school',
        'total_of_class',
        'total_of_10',
        'total_of_11',
        'total_of_12',
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
//                    'type_school' => 4
//                ]
//            ]);
//        });
//
//        self::deleted(function($model){
//            DB::table('schools')->where('school_id', '=', $model->id)->delete();
//        });
//    }
}

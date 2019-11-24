<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';

    protected $fillable = [
        'id',
        'name',
        'district_id',
        'commune_id',
        'address',
        'phone',
        'email',
        'website',
        'acreage',
        'name_of_principal',
        'type_of_school',
        'total_classroom',
        'total_function_room',
        'total_subject_room',
        'total_device_full',
        'total_device_not_full',
    ];

    public function district(){
        return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function commune(){
        return $this->belongsTo('App\Models\Commune', 'commune_id');
    }

    public function teacher_1(){
        return $this->hasMany('App\Models\Teacher')->whereIn('type_teacher', [1, 2, 3]);
    }
    public function teacher_2(){
        return $this->hasMany('App\Models\Teacher')->where('type_teacher', '=', '2');
    }
    public function teacher_3(){
        return $this->hasMany('App\Models\Teacher')->where('type_teacher', '=', '3');
    }
    public function teacher_4(){
        return $this->hasMany('App\Models\Teacher')->where('type_teacher', '=', '4');
    }
    public function teacher_5(){
        return $this->hasMany('App\Models\Teacher')->where('type_teacher', '=', '5');
    }


    public function teacher(){
        return $this->hasMany('App\Models\Teacher');
    }

    public function student(){
        return $this->hasMany('App\Models\Student');
    }
}

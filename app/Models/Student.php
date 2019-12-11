<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
       'id',
       'code',
       'name',
       'district_id',
       'commune_id',
       'school_id',
       'address',
       'name_of_dad',
       'name_of_mom',
       'phone',
       'type_of_student',
       'level',
       'gender',
       'birthday',
        'type_school',
        'avatar'
    ];

    public function school(){
        return $this->belongsTo('App\Models\School', 'school_id');
    }

    public function district(){
        return $this->belongsTo('App\Models\District', 'district_id')->select(['id', 'name']);
    }

    public function commune(){
        return $this->belongsTo('App\Models\Commune', 'commune_id')->select(['id', 'name']);
    }
}

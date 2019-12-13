<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'id',
        'code',
        'name',
        'district_id',
        'commune_id',
        'school_id',
        'address',
        'phone',
        'email',
        'type_teacher',
        'level',
        'birthday',
        'gender',
        'type_school',
        'avatar',
        'year'
    ];

    public function school(){
        return $this->belongsTo('App\Models\School', 'school_id');
    }

    public function district(){
        return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function commune(){
        return $this->belongsTo('App\Models\Commune', 'commune_id');
    }
}

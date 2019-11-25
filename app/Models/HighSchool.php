<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HighSchool extends Model
{
    protected $table = 'high_schools';

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

    public function district(){
        return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function commune(){
        return $this->belongsTo('App\Models\Commune', 'commune_id');
    }
}

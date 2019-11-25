<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NurserySchool extends Model
{
    protected $table = 'nursery_schools';

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
        'total_of_nursery_class',
        'total_of_nursery_3_12',
        'total_of_nursery_12_24',
        'total_of_nursery_25_36',
        'total_of_nursery_collect',
        'total_of_kindergarten_class',
        'total_of_kindergarten_3_4',
        'total_of_kindergarten_4_5',
        'total_of_kindergarten_5_6',
        'total_of_kindergarten_collect',
        'total_classroom_nursery',
        'total_classroom_kindergarten',
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

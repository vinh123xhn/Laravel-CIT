<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrimaryJuniorHighSchool extends Model
{
    protected $table = 'primary_junior_high_schools';

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

    public function district(){
        return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function commune(){
        return $this->belongsTo('App\Models\Commune', 'commune_id');
    }
}

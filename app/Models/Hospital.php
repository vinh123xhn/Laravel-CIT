<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = 'hospitals';

    protected $fillable = [
        'id',
        'name',
        'type',
        'phone',
        'address',
        'email',
        'website',
        'total',
        'count_doctor',
        'count_pharmacist',
        'count_nursing',
        'count_midwives',
    ];

    public function Type(){
        return $this->belongsTo('App\Models\TypeHospital', 'type')->select(['id', 'name']);
    }
}

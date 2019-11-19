<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'id',
        'name',
        'school_id',
        'birthday',
        'address',
        'type',
        'phone',
        'degree',
        'position',
    ];

    public function Hospital(){
        return $this->belongsTo('App\Models\Hospital', 'hospital_id')->select(['id', 'name']);
    }
}

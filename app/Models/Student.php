<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'id',
        'name',
        'school_id',
        'birthday',
        'address',
        'phone',
    ];

    public function Hospital(){
        return $this->belongsTo('App\Models\Hospital', 'hospital_id')->select(['id', 'name']);
    }
}

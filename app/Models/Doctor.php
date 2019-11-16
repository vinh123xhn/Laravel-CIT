<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'id',
        'name',
        'hospital_id',
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

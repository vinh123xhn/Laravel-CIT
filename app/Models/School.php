<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';

    protected $fillable = [
        'id',
        'name',
        'type',
        'address',
        'phone',
        'email',
        'website',
    ];

    public function Hospital(){
        return $this->belongsTo('App\Models\Hospital', 'hospital_id')->select(['id', 'name']);
    }
}

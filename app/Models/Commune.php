<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $table = 'communes';

    protected $fillable = [
        'id',
        'name',
        'district_id',
    ];

    public function district(){
        return $this->belongsTo('App\Models\District', 'district_id');
    }
}

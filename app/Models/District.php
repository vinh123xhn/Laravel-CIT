<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    protected $fillable = [
        'id',
        'name',
    ];

    public function commune(){
        return $this->hasMany('App\Models\Commune');
    }
}

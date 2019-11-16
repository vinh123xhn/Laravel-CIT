<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeHospital extends Model
{
    protected $table = 'type_hospital';

    protected $fillable = ['id', 'name', 'type'];
}

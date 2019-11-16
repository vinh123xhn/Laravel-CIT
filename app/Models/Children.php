<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    protected $table = 'childrens';

    protected $fillable = [
        'id',
        'name',
        'birthday',
        'address',
        'weight',
        'height',
        'comment',
        'type',
    ];
}

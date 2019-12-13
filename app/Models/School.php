<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class School extends Model
{
    protected $table = 'schools';

    protected $fillable = [
        'id',
        'code',
        'type_school',
        'name',
        'district_id',
        'commune_id',
        'address',
        'phone',
        'email',
        'website',
        'acreage',
        'name_of_principal',
        'avatar',
        'year'
    ];

    public function district(){
        return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function commune(){
        return $this->belongsTo('App\Models\Commune', 'commune_id');
    }


//    Count teacher
    public function teacher(){
        return $this->hasMany('App\Models\Teacher');
    }




//    Count Student
    public function student(){
        return $this->hasMany('App\Models\Student');
    }






    public function nursery() {
        return $this->hasOne('App\Models\NurserySchool');
    }
    public function primary() {
        return $this->hasOne('App\Models\PrimarySchool');
    }
    public function junior_high() {
        return $this->hasOne('App\Models\JuniorHighSchool');
    }
    public function high() {
        return $this->hasOne('App\Models\HighSchool');
    }
    public function primary_junior() {
        return $this->hasOne('App\Models\PrimaryJuniorHighSchool');
    }
    public function junior_and_high() {
        return $this->hasOne('App\Models\JuniorAndHighSchool');
    }
    public function cec() {
        return $this->hasOne('App\Models\ContinuingEducationCenter');
    }

    public static function boot() {
        parent::boot();

        self::deleted(function($model){
            switch ($model->type_school) {
                case 1:
                    DB::table('nursery_schools')->where('school_id', '=', $model->id)->delete();
                    break;
                case 2:
                    DB::table('primary_schools')->where('school_id', '=', $model->id)->delete();
                    break;
                case 3:
                    DB::table('junior_high_schools')->where('school_id', '=', $model->id)->delete();
                    break;
                case 4:
                    DB::table('high_schools')->where('school_id', '=', $model->id)->delete();
                    break;
                case 5:
                    DB::table('primary_junior_high_schools')->where('school_id', '=', $model->id)->delete();
                    break;
                case 6:
                    DB::table('junior_and_high_schools')->where('school_id', '=', $model->id)->delete();
                    break;
                case 7:
                    DB::table('continuing_education_centers')->where('school_id', '=', $model->id)->delete();
                    break;
            }
        });
    }
}

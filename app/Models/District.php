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
//    school
    public function school_nursery(){
        return $this->hasMany('App\Models\School')->where('schools.type_school', '=', '1');
    }
    public function school_primary(){
        return $this->hasMany('App\Models\School')->where('schools.type_school', '=', '2');
    }
    public function school_junior_high(){
        return $this->hasMany('App\Models\School')->where('schools.type_school', '=', '3');
    }
    public function school_high(){
        return $this->hasMany('App\Models\School')->where('schools.type_school', '=', '4');
    }
    public function school_primary_junior_high(){
        return $this->hasMany('App\Models\School')->where('schools.type_school', '=', '5');
    }
    public function school_junior_and_high(){
        return $this->hasMany('App\Models\School')->where('schools.type_school', '=', '6');
    }
    public function school_cec(){
        return $this->hasMany('App\Models\School')->where('schools.type_school', '=', '7');
    }

//    teacher
    public function teacher(){
        return $this->hasMany('App\Models\Teacher')->whereIn('teachers.type_teacher', [1,2,3,4,5]);
    }
    public function manager(){
        return $this->hasMany('App\Models\Teacher')->where('teachers.type_teacher', '=', '6');
    }
    public function employee(){
        return $this->hasMany('App\Models\Teacher')->where('teachers.type_teacher', '=', '7');
    }


//    student
    public function student_nursery(){
        return $this->hasMany('App\Models\Student')->where('students.type_school', '=', '1');
    }
    public function student_primary(){
        return $this->hasMany('App\Models\Student')->where('students.type_school', '=', '2');
    }
    public function student_junior_high(){
        return $this->hasMany('App\Models\Student')->where('students.type_school', '=', '3');
    }
    public function student_high(){
        return $this->hasMany('App\Models\Student')->where('students.type_school', '=', '4');
    }
    public function student_primary_junior_high(){
        return $this->hasMany('App\Models\Student')->where('students.type_school', '=', '5');
    }
    public function student_junior_and_high(){
        return $this->hasMany('App\Models\Student')->where('students.type_school', '=', '6');
    }
    public function student_cec(){
        return $this->hasMany('App\Models\Student')->where('students.type_school', '=', '7');
    }
}

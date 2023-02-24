<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable=['course_name','course_code','courses_credit_hours'];


    public function curricula(){
        return $this->hasMany('App\Models\Curriculum', 'courses_id');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher', 'course_teacher');
    }


    public function commons(){
        return $this->belongsToMany('App\Models\Common', 'common_course');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $guarded=[];
    //protected $fillable=['email','password','teacher_name','mobile_number','Address','genders_id'];


    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'genders_id');
    }

    public function nationalities()
    {
        return $this->belongsTo('App\Models\Nationality', 'nationalities_id');
    }


    public function blood()
    {
        return $this->belongsTo('App\Models\Blood', 'blood_id');
    }

    public function religons()
    {
        return $this->belongsTo('App\Models\Religon', 'religons_id');
    }


    public function departments()
    {
        return $this->belongsTo('App\Models\Department', 'departments_id');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course', 'course_teacher');
    }
}

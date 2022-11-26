<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    //protected $guarded=[];
    protected $table = 'curricula';
    protected $fillable=['colleges_id', 'departments_id', 'class_id', 'semesters_id', 'courses_id'];

    public function colleges()
    {
        return $this->belongsTo('App\Models\College', 'colleges_id');
    }


    public function departments()
    {
        return $this->belongsTo('App\Models\Department', 'departments_id');
    }

    public function classes()
    {
        return $this->belongsTo('App\Models\Clas', 'class_id');
    }

    public function semesters()
    {
        return $this->belongsTo('App\Models\Semester', 'semesters_id');
    }

    public function courses()
    {
        return $this->belongsTo('App\Models\Course', 'courses_id');
    }




}

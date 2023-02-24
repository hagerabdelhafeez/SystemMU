<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
    use HasFactory;
    protected $table = 'commons';
    protected $guarded=[];


    public function departments()
    {
        return $this->belongsTo('App\Models\Department', 'departments_id');
    }


    public function semesters(){
        return $this->belongsTo('App\Models\Semester', 'semesters_id');
    }



    public function courses(){
        return $this->belongsToMany('App\Models\Course', 'common_course');
    }


    public function years(){
        return $this->belongsTo('App\Models\Year', 'years_id');
    }
}

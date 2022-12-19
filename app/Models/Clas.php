<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    use HasFactory;
    protected $table = 'clas';
    protected $fillable = ['class_name'];

    public function semesters()
    {
        return $this->hasMany('App\Models\Semester', 'class_id');

    }


    public function departments()
    {
        return $this->belongsToMany('App\Models\Department', 'department_clas','clas_id','department_id');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student', 'class_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable=['department_name','colleges_id'];

    public function colleges()
    {
        return $this->belongsTo('App\Models\College', 'colleges_id');
    }

    public function classes()
    {
        return $this->belongsToMany('App\Models\Clas', 'department_clas','department_id','clas_id');
    }

    public function teachers()
    {
        return $this->hasMany('App\Models\Teacher', 'departments_id');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student', 'departments_id');
    }

    public function curricula(){
        return $this->hasMany('App\Models\Curriculum', 'departments_id');
    }

}

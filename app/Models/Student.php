<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $guarded=[];


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

    public function colleges()
    {
        return $this->belongsTo('App\Models\College', 'colleges_id');
    }

    public function classes()
    {
        return $this->belongsTo('App\Models\Clas', 'class_id');
    }

    public function years()
    {
        return $this->belongsTo('App\Models\Year', 'years_id');
    }

}

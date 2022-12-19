<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $table = 'years';
    protected $fillable=['year_name','year'];


    public function semesters(){
        return $this->belongsToMany('App\Models\Semester', 'semester_year');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student', 'years_id');
    }

}

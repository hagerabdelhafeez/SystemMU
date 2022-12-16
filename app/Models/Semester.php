<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $table = 'semesters';
    protected $fillable=['semester_name','class_id'];

    public function classes()
    {
        return $this->belongsTo('App\Models\Clas', 'class_id');
    }

    public function years()
    {
        return $this->belongsToMany('App\Models\Year', 'semester_year');
    }

}

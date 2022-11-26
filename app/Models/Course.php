<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable=['course_name','course_code','courses_credit_hours','colleges_id'];

    public function colleges()
    {
        return $this->belongsTo('App\Models\College', 'colleges_id');
    }
}

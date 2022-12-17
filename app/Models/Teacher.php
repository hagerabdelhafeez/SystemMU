<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    //protected $guarded=[];
    protected $fillable=['email','password','teacher_name','mobile_number','Address','genders_id'];

    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'genders_id');
    }
}

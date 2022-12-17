<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    //protected $guarded=[];
    protected $fillable=['email','password','employee_name','mobile_number','Address','genders_id'];

    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'genders_id');
    }
}

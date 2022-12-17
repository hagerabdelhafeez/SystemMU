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
}

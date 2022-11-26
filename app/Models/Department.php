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


}

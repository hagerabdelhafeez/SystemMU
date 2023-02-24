<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DepartmentClas extends Pivot
{
    use HasFactory;
    public $incrementing = true;
    protected $table = 'department_clas';
    protected $guarded=[];
}

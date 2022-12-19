<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religon extends Model
{
    use HasFactory;
    protected $table = 'religons';
    protected $fillable = ['religons_name'];
}

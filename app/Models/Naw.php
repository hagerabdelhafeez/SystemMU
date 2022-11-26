<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Naw extends Model
{

    use HasFactory;

    protected $table = 'naws';
    public $timestamps = true;
    protected $fillable =['title','photos','abstract','details'];
}

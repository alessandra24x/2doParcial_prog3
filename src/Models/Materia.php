<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model {
    protected $fillable = ['materia', 'cuatrimestre', 'cupos'];
    public $timestamps = false;

}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model {
    protected $fillable = ['alumno_id', 'materia_id'];
    public $timestamps = false;
    protected $table = 'inscriptos';

}
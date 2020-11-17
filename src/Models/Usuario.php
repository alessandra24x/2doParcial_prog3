<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    protected $fillable = ['email', 'nombre', 'clave', 'tipo'];
    protected $table = 'users';
    public $timestamps = false;
}
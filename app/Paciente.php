<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['cedula','nombre','direccion','fechaNacimiento','genero','numeroRegistro','numeroCama','idsala'];
}

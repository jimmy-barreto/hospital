<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    protected $fillable = ['codigo','nombre','direccion','telefono'];
}

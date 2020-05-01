<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use SoftDeletes;
    protected $fillable = ['codigo','nombre','direccion','telefono','cantidadCamas']; 
}

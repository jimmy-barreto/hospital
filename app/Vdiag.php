<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vdiag extends Model
{
    protected $fillable = ['fecha','idpaciente','iddiagnostico'];
}

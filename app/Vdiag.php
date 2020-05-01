<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vdiag extends Model
{
    use SoftDeletes;
    protected $fillable = ['fecha','idpaciente','iddiagnostico'];
}

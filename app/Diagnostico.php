<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $fillable = ['codigo','tipo','complicaciones'];
}

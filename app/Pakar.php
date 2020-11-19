<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pakar extends Authenticatable
{
    //
    protected $table = "pakar";
    public $timestamps = false;

}
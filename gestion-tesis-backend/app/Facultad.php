<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    //
    protected $table = "Facultad";
    protected $primaryKey = "fac_id";
    protected $fillable = array('fac_nombre','fac_siglas','fac_est_reg');
    public $timestamps = false;
}

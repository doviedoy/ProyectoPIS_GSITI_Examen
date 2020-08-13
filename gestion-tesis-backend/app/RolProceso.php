<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolProceso extends Model
{
    protected $table = "RolProceso";
    protected $primaryKey = "IdRolProceso";
    protected $fillable = array('IdRol','IdProceso');
    public $timestamps = false;
}

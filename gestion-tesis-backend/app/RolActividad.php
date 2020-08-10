<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolActividad extends Model
{
    protected $table = "RolActividad";
    protected $primaryKey = "IdRolActividad";
    protected $fillable = array('IdRolProceso','IdProcesoActividad','Permiso');
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcesoActividad extends Model
{
    protected $table = "ProcesoActividad";
    protected $primaryKey = "IdProcesoActividad";
    protected $fillable = array('IdProceso','Nombre');
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstudianteProceso extends Model
{
    protected $table="EstudianteProceso";
    protected $primarykey = "IdEstudianteProceso";
    protected $fillable = array('IdEstudiante','IdProcesoActividad','Permiso');
    public $timestamps = false;
}

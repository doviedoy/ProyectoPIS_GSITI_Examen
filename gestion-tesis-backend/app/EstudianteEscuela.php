<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstudianteEscuela extends Model
{
    //
    protected $table = "EstudianteEscuela";
    protected $primaryKey = "IdEstudianteEscuela";
    protected $fillable = array('IdEscuela','IdEstudiante');
    public $timestamps = false;
}

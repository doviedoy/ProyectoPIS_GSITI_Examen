<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurado extends Model
{
    //
    protected $table = "Jurado";
    protected $primaryKey = "IdJurado";
    protected $fillable = array('IdTesis','IdEstudiante','IdTipoJurado');
    public $timestamps = false;
}

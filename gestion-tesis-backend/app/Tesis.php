<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tesis extends Model
{
    //
    protected $table = "Tesis";
    protected $primaryKey = "IdTesis";
    protected $fillable = array('IdTesis','IdNombreTitulo','IdEstudianteEscuela','IdTipoTesis','IdEstado','IdDictamen','IdAsesor','TituloTesis');
    public $timestamps = false;
}

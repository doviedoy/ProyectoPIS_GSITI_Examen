<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $table = "Proceso";
    protected $primaryKey = "IdProceso";
    protected $fillable = array('NombreProceso');
    public $timestamps = false;
}

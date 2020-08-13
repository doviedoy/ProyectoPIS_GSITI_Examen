<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    //
     protected $table = "Escuela";
    protected $primaryKey = "idEscuela";
    protected $fillable = array('Escuela');
    public $timestamps = false;
}

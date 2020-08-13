<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "Rol";
    protected $primaryKey = "IdRol";
    protected $fillable = array('NombreRol');
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipodocumento extends Model
{
    protected $table = "DNITipo";
    protected $primarykey = "IdDNITipo";
    protected $fillable = array('TipoDNI');
    public $timestamps = false;
}

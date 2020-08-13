<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTesis extends Model
{
    //
    protected $table = "TipoTesis";
    protected $primaryKey = "IdTipoTesis";
    protected $fillable = array('TipoTesis');
    public $timestamps = false;
}

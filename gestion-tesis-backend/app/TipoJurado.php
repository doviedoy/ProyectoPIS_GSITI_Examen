<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoJurado extends Model
{
    //
    protected $table = "TipoJurado";
    protected $primaryKey = "IdTipoJurado";
    protected $fillable = array('TipoJurado');
    public $timestamps = false;
}

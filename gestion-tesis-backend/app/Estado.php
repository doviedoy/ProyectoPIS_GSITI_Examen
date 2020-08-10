<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $table = "Estado";
    protected $primaryKey = "IdEstado";
    protected $fillable = array('Estado');
    public $timestamps = false;
}

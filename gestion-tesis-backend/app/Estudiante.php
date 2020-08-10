<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    //
     protected $table = "Estudiante";
    protected $primaryKey = "est_id";
    protected $fillable = array('usu_id','est_nombre','est_correo','est_cui','est_dni','est_telefono','est_direccion','est_est_reg');
    public $timestamps = false;
}

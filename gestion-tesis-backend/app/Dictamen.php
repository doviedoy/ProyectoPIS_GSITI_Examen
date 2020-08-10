<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictamen extends Model
{
    //
    protected $table = "Dictamen";
    protected $primaryKey = "IdDictamen";
    protected $fillable = array('Dictamen');
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements  JWTSubject
{
   use  Notifiable;
    protected $table = 'Estudiante';
    protected  $fillable = [
        'Nombre', 'idDNITipo', 'DNI','Correo','Telefono','Direccion', 'password', 'Operador', 'Estudiante', 'Docente',
    ];

    public $timestamps = false;
    protected  $hidden = [
        'password', 'remember_token',
    ];


    public  function  getJWTIdentifier() {
        return  $this->getKey();
    }

    public  function  getJWTCustomClaims() {
        return [];
    }
}

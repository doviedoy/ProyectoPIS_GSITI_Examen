<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RolActividad;
use App\RolProceso;
use App\ProcesoActividad;

class RolActividadController extends Controller
{
    //

	public function show($idRolProceso){
		$data = RolActividad::select('RolActividad.IdRolActividad','ProcesoActividad.Nombre','RolActividad.Permiso')->join('ProcesoActividad','ProcesoActividad.IdProcesoActividad' ,'=','RolActividad.IdProcesoActividad')->where('RolActividad.IdRolProceso','=',$idRolProceso)->get();


        return response()->json($data,200);



}
}
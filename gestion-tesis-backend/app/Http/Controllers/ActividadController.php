<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProcesoActividad;

class ActividadController extends Controller
{
    public function index($id){
		$actividad = ProcesoActividad::select('ProcesoActividad.IdProcesoActividad','ProcesoActividad.IdProceso','ProcesoActividad.Nombre')->where('ProcesoActividad.IdProceso','=',$id)->get();
        return response()->json($actividad,200);

    }

    public function store(Request $request){

        request()->validate([
            'Nombre' => 'required|min:1|max:100',
        ]);

    	$ProcesoActividad = new ProcesoActividad;
        $ProcesoActividad->IdProceso = $request->IdProceso;
        $ProcesoActividad->Nombre = $request->Nombre;
    	$ProcesoActividad->save();

    	return response()->json($ProcesoActividad, 201);

    }


}
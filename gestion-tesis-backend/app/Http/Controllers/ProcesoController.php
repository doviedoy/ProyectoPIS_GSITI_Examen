<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proceso;
use App\RolProceso;

class ProcesoController extends Controller
{
    //

    public function show($id){
		$data = RolProceso::select('Proceso.IdProceso','Proceso.NombreProceso')->join('Proceso','Proceso.IdProceso' ,'=','RolProceso.IdProceso')->where('RolProceso.IdRol','=',$id)->get();
        return response()->json($data,200);

    }

    public function store(Request $request){

        request()->validate([
            'NombreProceso' => 'required|min:1|max:100',
        ]);

    	$Proceso = new Proceso;
        $Proceso->NombreProceso = $request->NombreProceso;
    	$Proceso->save();

    	return response()->json($Proceso, 201);

    }

    public function verProcesos(){
    	$Proceso = Proceso::select('IdProceso','NombreProceso')->get();
        return response()->json($Proceso, 200);
    }

}

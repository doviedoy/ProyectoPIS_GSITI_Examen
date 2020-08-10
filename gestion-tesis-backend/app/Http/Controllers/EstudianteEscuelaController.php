<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstudianteEscuela;
class EstudianteEscuelaController extends Controller
{
	public function index($id)
    {

        $EstudianteEscuela = EstudianteEscuela::distinct()->select('EstudianteEscuela.IdEstudianteEscuela','Escuela.idEscuela', 'Escuela.Escuela')->join('Escuela', 'Escuela.idEscuela', '=', 'EstudianteEscuela.IdEscuela')->where('EstudianteEscuela.IdEstudiante', $id)->get();

        return response()->json($EstudianteEscuela, 200);

    }

    public function store(Request $request){
    	$EstudianteEscuela = new EstudianteEscuela;
        $EstudianteEscuela->IdEscuela = $request->IdEscuela;
        $EstudianteEscuela->IdEstudiante = $request->IdEstudiante;
  		$EstudianteEscuela->save();
  		return response()->json($EstudianteEscuela, 200);
    }

    public function destroy($id){
    	$EstudianteEscuela = EstudianteEscuela::find($id);
        $EstudianteEscuela->delete();

        return response()->json(['Eliminacion' => true]);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tesis;
class TesisController extends Controller
{
    //
    public function index($id)
    {

        $Tesis = Tesis::distinct()->select('Tesis.IdTesis','TipoTesis.TipoTesis','Tesis.TituloTesis', 'Estudiante.Nombre')->join('TipoTesis', 'TipoTesis.IdTipoTesis', '=', 'Tesis.IdTipoTesis')->join('Jurado', 'Jurado.IdTesis', '=', 'Tesis.IdTesis')->join('TipoJurado', 'TipoJurado.IdTipoJurado', '=', 'Jurado.IdTipoJurado')->join('Estudiante', 'Estudiante.id', '=', 'Jurado.IdEstudiante')->where([['Tesis.IdEstudianteEscuela',$id],['TipoJurado.TipoJurado','Asesor']])->get();

        return response()->json($Tesis, 200);

    }

    public function store(Request $request){

        request()->validate([
            'TituloTesis' => 'required|max:255',
        ]);

    	$Tesis = new Tesis;
        $Tesis->IdNombreTitulo = 0;
        $Tesis->IdEstudianteEscuela = $request->IdEstudianteEscuela;
        $Tesis->IdTipoTesis = $request->IdTipoTesis;
        $Tesis->IdEstado = $request->IdEstado;
        $Tesis->IdDictamen = $request->IdDictamen;
        $Tesis->IdAsesor = 0;
        $Tesis->TituloTesis = $request->TituloTesis;

    	$Tesis->save();

    	return response()->json($Tesis, 201);
    }

    public function destroy($id){

        $Tesis = Tesis::find($id);
        $Tesis->delete();

        return response()->json(['Eliminacion' => true]);
    }
}

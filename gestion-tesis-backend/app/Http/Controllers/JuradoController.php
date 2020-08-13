<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurado;

class JuradoController extends Controller
{
    //listar jurados
    public function index(){
    	$Jurado = Jurado::select('IdJurado','IdTesis','IdEstudiante','IdTipoJurado')->get();
        return response()->json($Jurado, 200);
    }

    //registrar jurado
   
	public function store(Request $request){
    	
		request()->validate([
            'IdTesis' => 'required',
            'IdEstudiante' => 'required',
            'IdTipoJurado' => 'required'            
        ]);

    	$Jurado = new Jurado;
        $Jurado->IdTesis = $request->IdTesis;
        $Jurado->IdEstudiante = $request->IdEstudiante;
        $Jurado->IdTipoJurado = $request->IdTipoJurado;
  		$Jurado->save();
  		return response()->json($Jurado, 200);
    }

    //modificar registro  de jurado
    public function update(Request $request, $id)
    {
         request()->validate([
            'IdTesis' => 'required',
            'IdEstudiante' => 'required',
            'IdTipoJurado' => 'required'            
        ]);

    	$Jurado = Jurado::find($id);
        $Jurado->IdTesis = $request->IdTesis;
        $Jurado->IdEstudiante = $request->IdEstudiante;
        $Jurado->IdTipoJurado = $request->IdTipoJurado;
  		$Jurado->save();
    	return $this->show($id);
    }

    //eliminicacion de jurado
	public function destroy($id){
    	$Jurado = Jurado::find($id);
        $Jurado->delete();

        return response()->json(['Eliminacion' => true]);
    }


    //mostrar jurados
    public function show($id)
    {

        $Jurado = Jurado::select('IdJurado','IdTesis','IdEstudiante','IdTipoJurado')->find($id);
    	return response()->json($Jurado,200);

    }

    //buscar jurado
     public function getJuradoPerId(Request $request){

        request()->validate([
            'IdJurado' => 'required',           
        ]);

        $campoBusqueda='IdJurado';
        $datoEnviado=$request->IdJurado;
        $IdJurado = Jurado::where($campoBusqueda,'like','%'.$datoEnviado.'%')->select('IdJurado','IdTesis','IdEstudiante','IdTipoJurado')->get();
                return response()->json($Jurado,200);
    }



}

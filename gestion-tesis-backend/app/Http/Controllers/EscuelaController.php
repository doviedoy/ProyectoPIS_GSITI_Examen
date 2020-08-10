<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escuela;

class EscuelaController extends Controller
{
    //
     public function index()
    {
        $Escuela = Escuela::select('idEscuela','Escuela')->get();
        return response()->json($Escuela, 200);

    }

    public function store(Request $request){
    	$Escuela = new Escuela;
        $Escuela->Escuela = $request->Escuela;
  		$Escuela->save();
  		return response()->json($Escuela, 200);
    }
    public function destroy($id){
    	$Escuela = Escuela::find($id);
        $Escuela->delete();

        return response()->json(['Eliminacion' => true]);
    }
}
